<?php

namespace App\Models\Product\Attribute;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Model;

/**
* @mixin \Eloquent
*/
class SelectableAttributeOption extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }
}
