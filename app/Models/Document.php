<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $documentURL
 * @property integer $ideaID
 * @property Idea $idea
 */
class Document extends Model
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
    protected $fillable = ['documentURL', 'ideaID'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function idea()
    {
        return $this->belongsTo('App\Idea', 'ideaID');
    }
}
