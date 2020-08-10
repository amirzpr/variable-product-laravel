<?php

namespace App\Models\Product\Attribute\Type;

use Illuminate\Database\Eloquent\Model;

/**
* @mixin \Eloquent
*/
class MultiSelectable extends Model
{
    protected $table = 'selectable_attribute_values';
    protected $guarded = [];
    public $timestamps = false;
}