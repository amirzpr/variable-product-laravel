<?php

namespace App\Models\Product\Attribute;

use Illuminate\Database\Eloquent\Model;

/**
* @mixin \Eloquent
*/
class SelectableAttributeValue extends Model
{
    protected $table = 'selectable_attribute_values';
    protected $guarded = [];
    public $timestamps = false;
}