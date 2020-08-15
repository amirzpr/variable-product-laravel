<?php

namespace App\Models\Product;

use App\Models\Product\Attribute\ProductAttribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * @property Category rootCategory
 * @property Collection productAttributes
 * @property Collection allProductAttributes
 * @mixin \Eloquent
 */
class Product extends Model
{
    protected $guarded = [];

    public function rootCategory()
    {
        return $this->belongsTo(Category::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function productAttributes()
    {
        return $this->hasMany(ProductAttribute::class);
    }

    /**
     * Returns values of all attribute types in one collection
     *
     * @return Collection
     */
    public function getAllProductAttributesAttribute()
    {
        return ProductAttribute::with([
            'attributeBooleanValue',
            'attributeTextValue',
            'attributeOptionValues',
        ])->where('product_id', $this->id)->get();
    }
}
