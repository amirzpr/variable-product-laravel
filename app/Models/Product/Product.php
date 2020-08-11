<?php

namespace App\Models\Product;

use App\Models\Product\Attribute\Attribute;
use App\Models\Product\Attribute\BooleanAttributeValue;
use App\Models\Product\Attribute\SelectableAttributeValue;
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

    public function selectableAttributeValues()
    {
        return $this->hasMany(SelectableAttributeValue::class);
    }
}
