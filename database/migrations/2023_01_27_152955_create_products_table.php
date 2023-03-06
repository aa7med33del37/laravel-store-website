<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->string('name');
            $table->string('slug');
            $table->string('brand')->nullable();
            $table->mediumText('small_description')->nullable();
            $table->longText('description')->nullable();

            $table->decimal('original_price', 5, 2);
            $table->decimal('selling_price', 5, 2)->nullable();
            $table->integer('quantity');
            $table->enum('trading', [0, 1])->nullable()->default(0);
            $table->tinyInteger('featured')->nullable()->default(0);
            $table->tinyInteger('status')->default(1);

            $table->string('meta_title')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->mediumText('meta_description')->nullable();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('CASCADE');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
