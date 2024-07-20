<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateExpenseCategoryRequest;
use App\Http\Requests\UpdateExpenseCategoryRequest;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Queries\ExpenseCategoryDataTable;
use App\Repositories\ExpenseCategoryRepository;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\Facades\DataTables;
use App\Models\PredefinedReply;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;


class ExpenseCategoryController extends AppBaseController
{
    /** @var ExpenseCategoryRepository */
    private $expenseCategoryRepository;

    public function __construct(ExpenseCategoryRepository $expenseCategoryRepo)
    {
        $this->expenseCategoryRepository = $expenseCategoryRepo;


        if (!Schema::hasColumn('expense_categories', 'predefined_field')) {

            DB::statement("ALTER TABLE expense_categories ADD COLUMN  predefined_field TEXT");

        }


        if (!Schema::hasColumn('expense_categories', 'predefined_value')) {
            DB::statement("ALTER TABLE expense_categories  ADD COLUMN predefined_value   TEXT");
            DB::statement("ALTER TABLE expense_categories  ADD COLUMN predefined_label   TEXT");
        }


    }

    /**
     * Display a listing of the ExpenseCategory.
     *
     * @param  Request  $request
     * @return Factory|View
     *
     * @throws Exception
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            return DataTables::of((new ExpenseCategoryDataTable())->get())->make(true);
        }

        $fields  = PredefinedReply::orderby('id' ,  'desc')->get();

        return view('expense_categories.index')->with(['fields'=>$fields]);
    }

    /**
     * Store a newly created ExpenseCategory in storage.
     *
     * @param  CreateExpenseCategoryRequest  $request
     * @return JsonResponse
     */
    public function store(CreateExpenseCategoryRequest $request)
    {
        $input = $request->all();

        $expenseCategory = $this->expenseCategoryRepository->create($input);

        //get the details

        if($_POST['predefined_value']  !=  ""){
            $save_note =  ExpenseCategory::find($expenseCategory->id);
            $save_note->predefined_value = json_encode($_POST['predefined_value']  ,  true);
            $save_note->predefined_label = json_encode($_POST['predefined_label']  ,  true);
            $save_note->save();


            }


        activity()->performedOn($expenseCategory)->causedBy(getLoggedInUser())
            ->useLog('New Expense Category created.')->log($expenseCategory->name.' Expense Category created.');

        return $this->sendResponse($expenseCategory, __('messages.expense_category.expense_category_saved_successfully'));
    }

    /**
     * Show the form for editing the specified ExpenseCategory.
     *
     * @param  ExpenseCategory  $expenseCategory
     * @return JsonResponse
     */
    public function edit(ExpenseCategory $expenseCategory)
    {
        return $this->sendResponse($expenseCategory, 'Expense Category retrieved successfully.');
    }

    /**
     * Update the specified ExpenseCategory in storage.
     *
     * @param  ExpenseCategory  $expenseCategory
     * @param  UpdateExpenseCategoryRequest  $request
     * @return JsonResponse
     */
    public function update(ExpenseCategory $expenseCategory, UpdateExpenseCategoryRequest $request)
    {
        $input = $request->all();
        $expenseCategory = $this->expenseCategoryRepository->update($input, $expenseCategory->id);


        if($input['predefined_value']  !=  ""){
            $save_note =  ExpenseCategory::find($expenseCategory->id);
            $save_note->predefined_value = json_encode($input['predefined_value']  ,  true);
            $save_note->predefined_label = json_encode($input['predefined_label']  ,  true);
            $save_note->save();


            }


        activity()->performedOn($expenseCategory)->causedBy(getLoggedInUser())
            ->useLog('Expense Category updated.')->log($expenseCategory->name.' Expense Category updated.');

        return $this->sendSuccess(__('messages.expense_category.expense_category_updated_successfully'));
    }

    /**
     * Remove the specified ExpenseCategory from storage.
     *
     * @param  ExpenseCategory  $expenseCategory
     * @return JsonResponse
     */
    public function destroy(ExpenseCategory $expenseCategory)
    {
        $expenseCategoryId = Expense::where('expense_category_id', '=', $expenseCategory->id)->exists();

        if ($expenseCategoryId) {
            return $this->sendError(__('messages.expense_category.expense_category_used_somewhere_else'));
        }

        activity()->performedOn($expenseCategory)->causedBy(getLoggedInUser())
            ->useLog('Expense Category deleted.')->log($expenseCategory->name.' Expense Category deleted.');

        $expenseCategory->delete();

        return $this->sendSuccess('Expense Category deleted successfully.');
    }
}
