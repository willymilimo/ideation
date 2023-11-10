<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $userID
 * @property string $commentDetails
 * @property integer $ideaID
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @property Idea $idea
 */
class Comment extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['userID', 'commentDetails', 'ideaID', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User', 'userID');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function idea()
    {
        return $this->belongsTo('App\Idea', 'ideaID');
    }
}
