<?php

namespace App\Models;

use App\Models\Contracts\Taggable;
use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

/**
 * Class Estimate
 *
 * @version April 27, 2020, 6:16 am UTC
 *
 * @property int $id
 * @property string $title
 * @property int $customer_id
 * @property int $status
 * @property int $currency
 * @property string $estimate_number
 * @property string|null $reference
 * @property int|null $sales_agent_id
 * @property int|null $discount_type
 * @property Carbon $estimate_date
 * @property string $estimate_expiry_date
 * @property string|null $admin_note
 * @property float|null $discount
 * @property int $unit
 * @property float|null $sub_total
 * @property float $adjustment
 * @property float|null $total_amount
 * @property int|null $discount_symbol
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Customer $customer
 *
 * @method static Builder|Estimate newModelQuery()
 * @method static Builder|Estimate newQuery()
 * @method static Builder|Estimate query()
 * @method static Builder|Estimate whereAdjustment($value)
 * @method static Builder|Estimate whereAdminNote($value)
 * @method static Builder|Estimate whereCreatedAt($value)
 * @method static Builder|Estimate whereCurrency($value)
 *  * @method static Builder|Estimate whereTitle($value)
 * @method static Builder|Estimate whereCustomerId($value)
 * @method static Builder|Estimate whereDiscount($value)
 * @method static Builder|Estimate whereDiscountType($value)
 * @method static Builder|Estimate whereEstimateDate($value)
 * @method static Builder|Estimate whereEstimateExpiryDate($value)
 * @method static Builder|Estimate whereEstimateNumber($value)
 * @method static Builder|Estimate whereId($value)
 * @method static Builder|Estimate whereReference($value)
 * @method static Builder|Estimate whereSalesAgentId($value)
 * @method static Builder|Estimate whereStatus($value)
 * @method static Builder|Estimate whereSubTotal($value)
 * @method static Builder|Estimate whereTotalAmount($value)
 * @method static Builder|Estimate whereUnit($value)
 * @method static Builder|Estimate whereUpdatedAt($value)
 * @mixin Eloquent
 *
 * @property string|null $client_note
 * @property string|null $term_conditions
 *
 * @method static Builder|Estimate whereClientNote($value)
 * @method static Builder|Estimate whereTermConditions($value)
 *
 * @property-read Collection|EstimateAddress[] $estimateAddresses
 * @property-read int|null $estimate_addresses_count
 * @property-read Collection|SalesItem[] $salesItems
 * @property-read int|null $sales_items_count
 * @property-read Collection|SalesTax[] $salesTaxes
 * @property-read int|null $sales_taxes_count
 * @property-read Collection|Tag[] $tags
 * @property-read int|null $tags_count
 * @property-read User|null $user
 */
class Estimate extends Model implements Taggable
{
    const DISCOUNT_TYPES = [
        '2' => 'Add Discount',
       // '1' => 'Before Tax',
        '0' => 'No Discount',
    ];

    const STATUS = [
        '4' => 'Accepted',
        '3' => 'Declined',
        '0' => 'Drafted',
        '2' => 'Expired',
        '1' => 'Sent',
    ];

    const STATUS_COLOR = [
        0 => 'warning',
        1 => 'primary',
        2 => 'danger',
        3 => 'info',
        4 => 'success',
    ];

    const STATUS_DRAFT = 0;

    const STATUS_SEND = 1;

    const STATUS_EXPIRED = 2;

    const STATUS_DECLINED = 3;

    const STATUS_ACCEPTED = 4;

    const CLIENT_STATUS = [
        '4' => 'Accepted',
        '3' => 'Declined',
        '2' => 'Expired',
        '1' => 'Sent',
    ];

    protected $table = 'estimates';

    protected $fillable = [
        'title',
        'customer_id',
        'status',
        'currency',
        'estimate_number',
        'reference',
        'sales_agent_id',
        'discount_type',
        'estimate_date',
        'estimate_expiry_date',
        'admin_note',
        'discount',
        'unit',
        'sub_total',
        'adjustment',
        'total_amount',
        'client_note',
        'term_conditions',
        'discount_symbol',
        'hsn_tax',
        'is_admin',
        'discount_approved',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'customer_id' => 'integer',
        'estimate_number' => 'string',
        'estimate_date' => 'datetime',
        'estimate_expiry_date' => 'datetime',
        'sales_agent_id' => 'integer',
        'currency' => 'integer',
        'discount_type' => 'integer',
        'total_amount' => 'double',
        'sub_total' => 'double',
        'discount' => 'double',
        'adjustment' => 'double',
        'admin_note' => 'string',
        'discount_symbol' => 'integer',
        'unit' => 'integer',
        'client_note' => 'string',
        'term_conditions' => 'string',
        'hsn_tax' => 'string',
        'status' => 'integer',
        'reference' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'customer_id' => 'required',
        'estimate_number' => 'required',
        'estimate_date' => 'required',
        'currency' => 'required',
        'discount_type' => 'required',
        'unit' => 'required',
       'itemsArr' => 'required|array',
        'itemsArr.*.item' => 'required',
        'itemsArr.*.quantity' => 'required',
        'itemsArr.*.rate' => 'required',
    ];

    /**
     * @var array
     */
    public static $messages = [
        'customer_id.required' => 'Customer field is required.',
        'estimate_expiry_date.required' => 'The Expiry Date field is required.',
        'currency.required' => 'Currency field is required.',
        'itemsArr.required' => 'Atleast one product is required.',
        'itemsArr.*.item.required' => 'Product field is required.',
        'itemsArr.*.quantity.required' => 'Quantity field is required',
        'itemsArr.*.rate.required' => 'Rate field is required',
    ];

    /**
     * @return string
     */
    public static function generateUniqueEstimateId(): string
    {
        //$estimateId = mb_strtoupper(Str::random(4));
        $user  =  auth()->user()  ;
        $first_name = substr($user->first_name, 0, 1);
        $last_name  =  substr($user->last_name, 0, 2);

        $lastNumber    = 1  ;
          //check all the details.....
          if ($user->member_id   !=  NULL) {
            $string = $user->member_id;
            if (preg_match_all('/\d+/', $string, $matches)) {
                $numbers = $matches[0];
                $lastNumber = end($numbers);
            }
        }

             $lastNumber   = ltrim($lastNumber , '0');

             $total_estimate  =  sprintf('%04d', Estimate::count() + 1);
             $estimateId   =  mb_strtoupper( $first_name.  $last_name . "$lastNumber-".$total_estimate);

        while (true) {
            $isExist = self::whereEstimateNumber($estimateId)->exists();
            if ($isExist) {
                self::generateUniqueEstimateId();
            }
            break;
        }

        return $estimateId;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getOwnerType()
    {
        return self::class;
    }

    /**
     * @return BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sales_agent_id');
    }

    /**
     * @return MorphToMany
     */
    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    /**
     * @return MorphMany
     */
    public function salesItems(): MorphMany
    {
        return $this->morphMany(SalesItem::class, 'owner');
    }

    /**
     * @return MorphMany
     */
    public function salesTaxes(): MorphMany
    {
        return $this->morphMany(SalesTax::class, 'owner');
    }

    /**
     * @return HasMany
     */
    public function estimateAddresses(): HasMany
    {
        return $this->hasMany(EstimateAddress::class);
    }

    /**
     * @param  int  $currencyId
     * @return string
     */
    public static function getCurrencyText($currencyId): string
    {
        return Customer::CURRENCIES[$currencyId];
    }

    /**
     * @param  int  $discountTypeId
     * @return string
     */
    public function getDiscountTypeText($discountTypeId): string
    {
        return self::DISCOUNT_TYPES[$discountTypeId];
    }
}
