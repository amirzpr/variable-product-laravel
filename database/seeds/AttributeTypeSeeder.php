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
            'partial_panel' => 'partials.attr_type._boolean',
            ],
            [
            'title' => 'متن',
            'class' => Attribute\TextAttributeValue::class,
            'partial_panel' => 'partials.attr_type._text',
            ],
            [
            'title' => 'انتخاب تکی',
            'class' => Attribute\SelectableAttributeValue::class,
            'partial_panel' => 'partials.attr_type._selectable',
            ],
            [
            'title' => 'انتخاب چندتایی',
            'class' => Attribute\MultiSelectableAttributeValue::class,
            'partial_panel' => 'partials.attr_type._multi_selectable',
            ],
        ];

        AttributeType::insert($types);
    }
}
