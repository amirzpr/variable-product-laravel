<?php

namespace App\Models\Product\Attribute;

use Illuminate\Database\Eloquent\Model;

/**
* @mixin \Eloquent
*/
class TextAttributeValue extends Model
{
    protected $table = 'text_attribute_values';
    protected $guarded = [];
    public $timestamps = false;
}