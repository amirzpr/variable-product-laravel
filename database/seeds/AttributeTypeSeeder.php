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
            ['title' => 'چک باکس', 'class' => Type\Boolean::class],
            ['title' => 'متن', 'class' => Type\Text::class],
            ['title' => 'انتخاب تکی', 'class' => Type\Selectable::class],
            ['title' => 'انتخاب چندتایی', 'class' => Type\MultiSelectable::class],
        ];

        AttributeType::insert($types);
    }
}
