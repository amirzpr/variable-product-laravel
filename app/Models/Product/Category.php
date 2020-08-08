<?php

namespace App\Models\Product;

use App\Models\Product\Attribute\Attribute;
use App\Models\Product\Attribute\AttributeGroup;
use Illuminate\Database\Eloquent\Model;

/**
* @mixin \Eloquent
*/
class Category extends Model
{
    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function attributeGroups()
    {
        return $this->hasMany(AttributeGroup::class);
    }

    public function attributes()
    {
        return $this->hasManyThrough(Attribute::class, AttributeGroup::class);
    }
}
