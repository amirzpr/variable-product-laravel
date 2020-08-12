<?php

namespace App\Models\Product\Attribute;

use Illuminate\Database\Eloquent\Model;

/**
 * @property AttributeType type
* @mixin \Eloquent
*/
class Attribute extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function group()
    {
        return $this->belongsTo(AttributeGroup::class, 'attribute_group_id');
    }

    public function type()
    {
        return $this->belongsTo(AttributeType::class, 'attribute_type_id');
    }

    public function attributeOptions()
    {
        return $this->hasMany(AttributeOption::class);
    }

    /**
     * Create Attribute options from a simple array and attach them to the attribute
     *
     * @param array $options_array an array that contains option values
     */
    public function saveOptions($options_array)
    {
        $options = array_map( function ($option) {
            return AttributeOption::make(['value' => trim($option)]);
        }, $options_array);

        $this->attributeOptions()->saveMany($options);
    }
}
