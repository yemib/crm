<?php

namespace App\Http\Livewire;

use App\Models\Invoice;
use App\Repositories\InvoiceRepository;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class  Warranty  extends SearchableComponent
{

    public $status;
    public $statusFilter = '';

    public $customer = '';

    /**
     * @var string[]
     */
    protected $listeners = [
        'refresh' => '$refresh',
        'filterStatus',
    ];

    /**
     * @return string
     */
    public function model()
    {
        return Invoice::class;
    }
    public function mount($status)
    {
        $this->status = $status; // Store the received parameter in the property
    }



    /**
     * @return string[]
     */
    public function searchableFields()
    {
        return [
            'title',
            'invoice_number',
            'customer.company_name',
        ];
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|View
     */
    public function render()
    {
        $invoices = $this->searchInvoices();
        $invoiceRepo = app(InvoiceRepository::class);
        $statusCount = $invoiceRepo->getInvoicesStatusCount();
        $customer = $this->customer;
        $invoiceStatus = Invoice::PAYMENT_STATUS;
        $status = $this->status ;


        return view('livewire.warranty', compact('invoices', 'statusCount', 'customer', 'invoiceStatus' , 'status' ));



    }

    /**
     * @return LengthAwarePaginator
     */
    public function searchInvoices()
    {
        $this->setQuery($this->getQuery()->with('customer'));
        $this->getQuery()->where(function (Builder $query) {
            $this->filterResults();
        });

        $assign  =   permission_count(auth()->user()->id  ,  41);
        $manage  =   permission_count(auth()->user()->id  ,  42);
           if( $assign  > 0  && $manage   ==  0){

          $this->getQuery()->where('employees'  , auth()->user()->id);

           }


          $this->getQuery()->where('warranty'  , $this->status);

        $this->getQuery()->when($this->statusFilter !== '', function (Builder $q) {
            $q->where('payment_status', $this->statusFilter);
        });

        $this->getQuery()->when($this->customer !== '', function (Builder $q) {
            $q->where('customer_id', $this->customer);
        });

        return $this->paginate();
    }

    /**
     * @return Builder
     */
    public function filterResults()
    {
        $searchableFields = $this->searchableFields();
        $search = $this->search;

        $this->getQuery()->when(! empty($search), function (Builder $q) use ($search, $searchableFields) {
            $this->getQuery()->where(function (Builder $q) use ($search, $searchableFields) {
                $searchString = '%'.$search.'%';
                foreach ($searchableFields as $field) {
                    if (Str::contains($field, '.')) {
                        $field = explode('.', $field);
                        $q->orWhereHas($field[0], function (Builder $query) use ($field, $searchString) {
                            $query->whereRaw("lower($field[1]) like ?", $searchString);
                        });
                    } else {
                        $q->orWhereRaw("lower($field) like ?", $searchString);
                    }
                }
            });
        });

        return $this->getQuery();
    }

    /**
     * @param  int  $id
     */
    public function filterStatus($id)
    {
        $this->statusFilter = $id;
        $this->resetPage();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
