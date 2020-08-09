<?php

namespace App\Models\Product\Attribute;

use App\Models\Product\Category;
use Illuminate\Database\Eloquent\Model;

/**
* @mixin \Eloquent
*/
class AttributeGroup extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }
}
