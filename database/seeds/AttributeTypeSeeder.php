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
            'name' => 'boolean',
            'label' => 'چک باکس',
            'partial' => 'partials.attribute._boolean',
            ],
            [
            'name' => 'text',
            'label' => 'متن',
            'partial' => 'partials.attribute._text',
            ],
            [
            'name' => 'select',
            'label' => 'انتخابی',
            'partial' => 'partials.attribute._select',
            ],
        ];

        AttributeType::insert($types);
    }
}
