<?php

namespace App\Models\Product\Attribute;

use Illuminate\Database\Eloquent\Model;

/**
* @mixin \Eloquent
*/
class AttributeType extends Model
{
    protected $guarded = [];

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }
}
