<?php




namespace App\Models;

use Barryvdh\LaravelIdeHelper\Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\MemberGroup
 *
 * @property int $id
 * @property string $name
 * @property mixed|null $description
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static Builder|MemberGroup newModelQuery()
 * @method static Builder|MemberGroup newQuery()
 * @method static Builder|MemberGroup query()
 * @method static Builder|MemberGroup whereCreatedAt($value)
 * @method static Builder|MemberGroup whereDescription($value)
 * @method static Builder|MemberGroup whereId($value)
 * @method static Builder|MemberGroup whereName($value)
 * @method static Builder|MemberGroup whereUpdatedAt($value)
 * @mixin Eloquent
 */
class MemberGroup extends Model
{
    /**
     * @var array
     */
    public static $rules = [
        'name' => 'required|unique:member_groups,name',
    ];

    /**
     * @var string
     */
    protected $table = 'member_groups';

    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'description' => 'string',
    ];

    /**
     * @param $value
     * @return string
     */
    public function getDescriptionAttribute($value): string
    {
        return htmlspecialchars_decode($value);
    }

    /**
     * @return HasMany
     */
   public function members(): HasMany
    {
        return $this->hasMany(MemberToMemberGroup::class, 'member_group_id');
    } 
}
