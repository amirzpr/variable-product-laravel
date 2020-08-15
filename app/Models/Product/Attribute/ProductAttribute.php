<?php

namespace App\Models\Product\Attribute;

use App\Models\Product\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

/**
 * @property Attribute attribute
 * @property Collection values
 * @property AttributeTextValue attributeTextValue
 * @property AttributeBooleanValue attributeBooleanValue
 * @property Collection attributeOptionValues
 * @mixin \Eloquent
 */
class ProductAttribute extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function attribute()
    {
        return $this->belongsTo(Attribute::class);
    }

    public function attributeBooleanValue()
    {
        return $this->hasOne(AttributeBooleanValue::class);
    }

    public function attributeTextValue()
    {
        return $this->hasOne(AttributeTextValue::class);
    }

    public function attributeOptionValues()
    {
        return $this->belongsToMany(AttributeOptionValue::class, 'product_option')->withPivot('price');
    }


    /**
     * Return context-based attribute values of the product
     *
     * @return mixed
     */
    public function getValuesAttribute()
    {
        switch ($this->attribute->type->name) {
            case AttributeType::boolean:
                return collect([$this->attributeBooleanValue]);
            case AttributeType::text:
                return collect([$this->attributeTextValue]);
            case AttributeType::select:
                return $this->attributeOptionValues;
        }
    }

    /**
     * Persist ProductAttribute and sync its related values
     *
     * @param  array|bool|string  $value
     * @throws \Exception
     */
    public function saveAttributeValues($value)
    {
        if (empty($value)) {
            $this->delete();
            return;
        }

        $this->save();

        if (is_array($value)) {
            $this->attributeOptionValues()->sync($value);
        } elseif (is_bool($value)) {
            $this->attributeBooleanValue()->updateOrCreate(['value' => $value]);
        } else {
            $this->attributeTextValue()->updateOrCreate(['value' => $value]);
        }
    }
}