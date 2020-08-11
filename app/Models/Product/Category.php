<?php

namespace App\Models\Product;

use App\Models\Product\Attribute\AttributeGroup;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * @mixin \Eloquent
 * @property Collection parents
 * @property Collection allAttributeGroups
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

    /**
     * Returns this category's parent category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    /**
     * Returns a collection of all parent categories
     *
     * @return Collection
     */
    public function getParentsAttribute()
    {
        $parents = collect([]);
        $parent = $this->parent;

        while( !is_null($parent) ) {
            $parents->push($parent);
            $parent = $parent->parent;
        }

        return $parents;
    }

    /**
     * Returns attribute groups of this category
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attributeGroups()
    {
        return $this->hasMany(AttributeGroup::class);
    }

    /**
     * Returns attribute groups of this category and all of its parents
     *
     * @return Collection
     */
    public function getAllAttributeGroupsAttribute()
    {
        $attributeGroups = $this->attributeGroups;

        foreach ($this->parents as $category) {
            $attributeGroups->push($category->attributeGroups);
        }

        return $attributeGroups->flatten();
    }
}
