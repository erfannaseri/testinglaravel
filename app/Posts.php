<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
/**
 * App\Posts
 *
 * @property int $id
 * @property string $title
 * @property string $content
 * @property string $author
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static bool|null forceDelete()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts newQuery()
 * @method static \Illuminate\Database\Query\Builder|\App\Posts onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts query()
 * @method static bool|null restore()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts whereAuthor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Posts whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Posts withTrashed()
 * @method static \Illuminate\Database\Query\Builder|\App\Posts withoutTrashed()
 * @mixin \Eloquent
 */
class Posts extends Model
{
    use SoftDeletes;
    protected $table='posts';
    protected $fillable=[
        'title','content','author'
    ];

    /**
     * @var false|resource|string|null
     */

}
