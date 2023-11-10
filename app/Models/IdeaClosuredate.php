<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $idea_closuredate
 * @property string $comment_closuredate
 * @property string $academic_Year
 * @property string $created_at
 * @property string $updated_at
 */
class IdeaClosuredate extends Model
{
    /**
     * The "type" of the auto-incrementing ID.
     * 
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * Indicates if the IDs are auto-incrementing.
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $fillable = ['idea_closuredate', 'comment_closuredate', 'academic_Year', 'created_at', 'updated_at'];
}
