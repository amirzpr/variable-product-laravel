<?php

use App\Models\Product\Attribute\AttributeType;
use Illuminate\Database\Seeder;
use App\Models\Product\Attribute\Type;

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
            'class' => Type\Boolean::class,
            'partial_panel' => 'partials.attr_type._boolean',
            ],
            [
            'title' => 'متن',
            'class' => Type\Text::class,
            'partial_panel' => 'partials.attr_type._text',
            ],
            [
            'title' => 'انتخاب تکی',
            'class' => Type\Selectable::class,
            'partial_panel' => 'partials.attr_type._selectable',
            ],
            [
            'title' => 'انتخاب چندتایی',
            'class' => Type\MultiSelectable::class,
            'partial_panel' => 'partials.attr_type._multi_selectable',
            ],
        ];

        AttributeType::insert($types);
    }
}
