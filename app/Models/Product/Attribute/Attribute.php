<?php

namespace App\Models\Product\Attribute;

use App\Models\Product\Category;
use Illuminate\Database\Eloquent\Model;

/**
* @mixin \Eloquent
*/
class Attribute extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function attributeGroup()
    {
        return $this->belongsTo(AttributeGroup::class);
    }

    public function attributeType()
    {
        return $this->belongsTo(AttributeType::class);
    }

    public function attributeOptions()
    {
        return $this->hasMany(SelectableAttributeOption::class);
    }


    /**
     * Create Attribute options from a simple array and attach them to the attribute
     *
     * @param array $options_array an array that contains option values
     */
    public function attachOptions($options_array)
    {
        $options = array_map( function ($option) {
            return SelectableAttributeOption::make(['value' => trim($option)]);
        }, $options_array);

        $this->attributeOptions()->saveMany($options);
    }
}
