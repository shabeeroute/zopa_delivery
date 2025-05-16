<?php

use App\Models\Product;
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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('name_ar')->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->text('description_ar')->nullable();

            $table->integer('model_year')->nullable();
            $table->string('barcode')->nullable();
            // $table->smallInteger('type')->default(1)->comment('1:single, 2:bundle ');
            // $table->integer('no_items')->nullable();
            $table->text('images')->nullable();
            // $table->text('video')->nullable();
            $table->integer('delivery_days')->default(0);
            $table->boolean('is_featured')->comment('1-featured,0-normal')->default(0);
            $table->boolean('is_trending')->comment('1-trending,0-normal')->default(0);
            $table->boolean('is_available')->comment('1-available,0-rented')->default(1);
            $table->date('available_at')->nullable();
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->unsignedBigInteger('sub_category_id')->nullable();
            $table->foreign('sub_category_id')->references('id')->on('sub_categories')->onDelete('cascade');

            // $table->string('sku')->nullable();
            // $table->string('size')->nullable();
            // $table->string('color')->nullable();
            $table->foreignId('tax_type_id')->nullable();
            $table->foreign('tax_type_id')->references('id')->on('tax_types')->cascadeOnDelete();
            // $table->string('uom')->nullable();
            //$table->double('purchase_price')->nullable();
            // $table->double('price')->nullable();
            //$table->integer('quantity')->nullable();
            // $table->text('video')->nullable();
            // $table->string('warranty')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->boolean('status')->comment('1-active,0-inactive')->default(1);
            $table->string('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('slug')->nullable();
            $table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            // $table->foreignId('seller_id')->nullable();
            // $table->foreign('seller_id')->references('id')->on('sellers')->cascadeOnDelete();
            // $table->boolean('rent_type')->comment('1-rent,0-normal')->default(0);
            // $table->boolean('is_available')->comment('1-available,0-not available')->default(0);
            // $table->date('available_at')->nullable();
            $table->timestamps();
        });

        Product::create(['name'=>'Iphone','name_ar'=>'Iphone', 'image'=>NULL,'description'=>'iphone description', 'description_ar'=>'iphone description', 'tax_type_id'=>'2', 'status'=>1, 'model_year'=>2022 , 'barcode'=>2022, 'delivery_days' => 2, 'meta_title'=>'Meta Title', 'meta_keywords'=>'Meta Key word', 'meta_description'=>'Meta Description', 'user_id'=>1, 'brand_id'=>1,'branch_id'=>1,'sub_category_id'=>1, 'created_at'=>now()]);
        Product::create(['name'=>'Samsung','name_ar'=>'Samsung', 'image'=>NULL,'description'=>'Samsung description', 'description_ar'=>'Samsung description','tax_type_id'=>'2', 'status'=>1, 'model_year'=>2023 , 'barcode'=>2023, 'delivery_days' => 2, 'meta_title'=>'Meta Title', 'meta_keywords'=>'Meta Key word', 'meta_description'=>'Meta Description', 'user_id'=>1, 'brand_id'=>2,'branch_id'=>3,'sub_category_id'=>1, 'created_at'=>now()]);
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
