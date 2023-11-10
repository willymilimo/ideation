<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $roleName
 */
class Role extends Model
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
    protected $fillable = ['roleName'];


    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }
}
