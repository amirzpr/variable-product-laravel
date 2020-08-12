<?php

use App\Models\Product\Attribute\AttributeType;
use Illuminate\Database\Seeder;
use App\Models\Product\Attribute;

class AttributeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
            'title' => 'چک باکس',
            'class' => Attribute\BooleanAttributeValue::class,
            'partial' => 'partials.attribute._boolean',
            ],
            [
            'title' => 'متن',
            'class' => Attribute\TextAttributeValue::class,
            'partial' => 'partials.attribute._text',
            ],
            [
            'title' => 'انتخاب تکی',
            'class' => Attribute\SelectableAttributeValue::class,
            'partial' => 'partials.attribute._select',
            ],
            [
            'title' => 'انتخاب چندتایی',
            'class' => Attribute\MultiSelectableAttributeValue::class,
            'partial' => 'partials.attribute._multi',
            ],
        ];

        AttributeType::insert($types);
    }
}
