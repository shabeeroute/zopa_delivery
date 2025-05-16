<?php

use App\Models\ProductItem;
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
        Schema::create('product_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_code');
            $table->string('name');
            $table->string('name_ar');
            $table->integer('model_year')->nullable();
            //$table->double('price')->nullable();
            $table->string('barcode')->nullable();
            $table->smallInteger('type')->default(1)->comment('1:single, 2:bundle ');
            $table->integer('no_items')->nullable();
            $table->string('image')->nullable();
            $table->text('images')->nullable();
            $table->text('glocation')->nullable();
            $table->double('latitude', 10, 6)->nullable();
            $table->double('longitude', 10, 6)->nullable();
            $table->text('video')->nullable();
            $table->integer('delivery_days')->default(0);
            $table->boolean('is_featured')->comment('1-featured,0-normal')->default(0);
            $table->boolean('is_trending')->comment('1-trending,0-normal')->default(0);
            $table->boolean('is_available')->comment('1-available,0-rented')->default(1);
            $table->date('available_at')->nullable();
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            // $table->boolean('is_customer')->comment('1-customer,0-branch')->default(0);
            $table->unsignedBigInteger('branch_id')->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            // $table->unsignedBigInteger('customer_id')->nullable();
            // $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->boolean('status')->comment('1-active,0-inactive')->default(1);
            $table->string('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('slug')->nullable();
            $table->timestamps();
        });

        ProductItem::create(['item_code'=>'XV34','name'=>'iPhone 11 Pro Max','name_ar'=>'iPhone 11 Pro Max', 'model_year'=>2022 , 'barcode'=>2022, 'image'=>NULL,'glocation'=>'google.com', 'video'=>'youtube.com', 'delivery_days' => 2, 'product_id'=>'1', /*'customer_id'=>'1',*/ 'branch_id'=>1, 'created_at'=>now()]);
        ProductItem::create(['item_code'=>'XV312', 'name'=>'Samsung Galaxy S23 Ultra 5G','name_ar'=>'Samsung Galaxy S23 Ultra 5G', 'model_year'=>2023, 'barcode'=>2022, 'image'=>NULL,'glocation'=>'google.com', 'video'=>'youtube.com', 'delivery_days' => 2, 'product_id'=>'2', /*'customer_id'=>'1',*/ 'branch_id'=>1, 'created_at'=>now()]);
        ProductItem::create(['item_code'=>'XV312', 'name'=>'iPhone 6s Plus','name_ar'=>'Samsung Galaxy A21s', 'model_year'=>2023, 'barcode'=>2022, 'image'=>NULL,'glocation'=>'google.com', 'video'=>'youtube.com', 'delivery_days' => 2, 'product_id'=>'1', /*'customer_id'=>'2',*/ 'branch_id'=>3, 'created_at'=>now()]);
        ProductItem::create(['item_code'=>'XV312', 'name'=>'Samsung Galaxy A21s','name_ar'=>'Samsung Galaxy A21s', 'model_year'=>2023, 'barcode'=>2022, 'image'=>NULL,'glocation'=>'google.com', 'video'=>'youtube.com', 'delivery_days' => 2, 'product_id'=>'2', /*'customer_id'=>'1',*/ 'branch_id'=>2, 'created_at'=>now()]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_items');
    }
};
