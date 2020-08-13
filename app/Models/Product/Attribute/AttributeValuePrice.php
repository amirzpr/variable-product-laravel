<?php

namespace App\Models\Product\Attribute;

use Illuminate\Database\Eloquent\Model;

class AttributeValuePrice extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function priceable()
    {
        return $this->morphTo();
    }
}
