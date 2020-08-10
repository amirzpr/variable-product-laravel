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

    /**
     * Return Products that this category is their root category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function rootProducts()
    {
        return $this->hasMany(Product::class, 'root_category_id');
    }

    /**
     * Return Products that this category is one of their chosen categories
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
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
