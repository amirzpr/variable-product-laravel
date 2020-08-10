<?php

namespace App\Models\Product\Attribute\Type;

use Illuminate\Database\Eloquent\Model;

/**
* @mixin \Eloquent
*/
class Boolean extends Model
{
    protected $table = 'boolean_attribute_values';
    protected $guarded = [];
    public $timestamps = false;
}