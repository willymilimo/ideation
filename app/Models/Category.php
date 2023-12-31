<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $categoryName
 * @property string $categoryDescriptions
 * @property string $created_at
 * @property string $updated_at  
 * @property Idea[] $ideas
 */
class Category extends Model
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
    protected $fillable = ['categoryName', 'categoryDescriptions', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ideas()
    {
        return $this->hasMany('App\Idea', 'categoryID');
    }
}
