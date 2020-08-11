<?php

namespace App\Models\Product\Attribute;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Model;

/**
* @mixin \Eloquent
*/
class AttributeOption extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
