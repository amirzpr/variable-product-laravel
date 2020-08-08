<?php

namespace App\Models\Product\Attribute;

use Illuminate\Database\Eloquent\Model;

/**
* @mixin \Eloquent
*/
class Attribute extends Model
{
    protected $guarded = [];

    public function attributeGroup()
    {
        return $this->belongsTo(AttributeGroup::class);
    }

    public function attributeType()
    {
        return $this->belongsTo(AttributeType::class);
    }

    public function attributeItems()
    {
        return $this->hasMany(AttributeItem::class);
    }
}
