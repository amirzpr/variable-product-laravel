<?php

namespace App\Models\Product;

use App\Models\Product\Attribute\AttributeOption;
use App\Models\Product\Attribute\BooleanAttributeValue;
use App\Models\Product\Attribute\TextAttributeValue;
use Illuminate\Database\Eloquent\Model;

/**
 * @property Category rootCategory
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

    public function booleanAttributeValues()
    {
        return $this->hasMany(BooleanAttributeValue::class);
    }

    public function textAttributeValues()
    {
        return $this->hasMany(TextAttributeValue::class);
    }

    public function selectableAttributeValues()
    {
        return $this->belongsToMany(AttributeOption::class, 'selectable_attribute_values',
            'product_id', 'option_id');
    }

    public function multiSelectableAttributeValues()
    {
        return $this->belongsToMany(AttributeOption::class, 'multi_selectable_attribute_values',
            'product_id', 'option_id');
    }

    /**
     * Returns values of all attribute types in one collection
     *
     * @return \Illuminate\Support\Collection
     */
    public function getAllAttributeValuesAttribute()
    {
        return collect([
            $this->booleanAttributeValues,
            $this->textAttributeValues,
            $this->selectableAttributeValues,
            $this->multiSelectableAttributeValues,
        ])->flatten();
    }
}
