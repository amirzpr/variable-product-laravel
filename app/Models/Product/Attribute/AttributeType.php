<?php

namespace App\Models\Product\Attribute;

use Illuminate\Database\Eloquent\Model;

/**
 * @property AttributeValue attributeValue
* @mixin \Eloquent
*/
class AttributeType extends Model
{
    protected $guarded = [];

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }

    public function getAttributeValueAttribute()
    {
        return resolve($this->class);
    }
}
