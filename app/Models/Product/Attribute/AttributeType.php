<?php

namespace App\Models\Product\Attribute;

use Illuminate\Database\Eloquent\Model;

/**
 * @mixin \Eloquent
 */
class AttributeType extends Model
{
    protected $guarded = [];

    const boolean = 'boolean';
    const text = 'text';
    const select = 'select';

    public function attributes()
    {
        return $this->hasMany(Attribute::class);
    }
}
