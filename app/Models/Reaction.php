<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $thumbsUP
 * @property string $thumbsDown
 * @property integer $ideaID
 * @property Idea $idea
 * @property Idea[] $ideas
 */
class Reaction extends Model
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
    protected $fillable = ['thumbsUP', 'thumbsDown', 'ideaID','created_at','updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function idea()
    {
        return $this->belongsTo('App\Idea', 'ideaID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ideas()
    {
        return $this->hasMany('App\Idea', 'reactionID');
    }
}
