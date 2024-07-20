<?php

namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * Class ExpenseCategory
 *
 * @version April 3, 2020, 9:11 am UTC
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder|ExpenseCategory newModelQuery()
 * @method static Builder|ExpenseCategory newQuery()
 * @method static Builder|ExpenseCategory query()
 * @method static Builder|ExpenseCategory whereCreatedAt($value)
 * @method static Builder|ExpenseCategory whereDescription($value)
 * @method static Builder|ExpenseCategory whereId($value)
 * @method static Builder|ExpenseCategory whereName($value)
 * @method static Builder|ExpenseCategory whereUpdatedAt($value)
 * @mixin Eloquent
 */
class WarrantyType extends Model
{
    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'number' => 'required',
        'type' => 'required'
    ];

    /**
     * @var string
     */
    protected $table = 'warranty_types';

    /**
     * @var array
     */
    protected $fillable = [
        'number',
        'type'

    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'number' => 'integer',
        'type' => 'string'
            ];

    /**
     * @return HasMany
     */

}
