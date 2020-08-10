<?php

namespace App\Models\Product\Attribute\Type;

use Illuminate\Database\Eloquent\Model;

/**
* @mixin \Eloquent
*/
class Text extends Model
{
    protected $table = 'text_attribute_values';
    protected $guarded = [];
    public $timestamps = false;
}