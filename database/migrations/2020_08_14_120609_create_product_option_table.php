<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_option', function (Blueprint $table) {
            $table->foreignId('product_attribute_id')->constrained()->cascadeOnDelete();
            $table->foreignId('attribute_option_value_id')->constrained()->cascadeOnDelete();

            $table->primary(['product_attribute_id', 'attribute_option_value_id'], 'product_option_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_option');
    }
}
