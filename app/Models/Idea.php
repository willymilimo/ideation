<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $staffId
 * @property string $title
 * @property integer $reactionID
 * @property string $viewCount
 * @property string $status
 * @property integer $categoryID
 * @property integer $departmentID
 * @property Department $department
 * @property Category $catergory
 * @property User $user
 * @property Reaction $reaction
 * @property Comment[] $comments
 * @property Document[] $documents
 * @property Reaction[] $reactions
 */
class Idea extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = ['staffId', 'title', 'reactionID', 'viewCount', 'status', 'categoryID', 'departmentID', 'idealDetails','created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function department()
    {
        return $this->belongsTo('App\Department', 'departmentID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function catergory()
    {
        return $this->belongsTo('App\Catergory', 'categoryID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'staffId');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reaction()
    {
        return $this->belongsTo('App\Reaction', 'reactionID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany('App\Comment', 'ideaID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function documents()
    {
        return $this->hasMany('App\Document', 'ideaID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reactions()
    {
        return $this->hasMany('App\Reaction', 'ideaID');
    }
}
