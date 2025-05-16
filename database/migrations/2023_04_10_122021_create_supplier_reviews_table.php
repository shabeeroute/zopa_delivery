<?php

use App\Models\CustomerReview;
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
        Schema::create('supplier_reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('description');
            $table->integer('rating');
            $table->morphs('reviewable');
            $table->foreignId('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->cascadeOnDelete();
            $table->boolean('status')->comment('1-Active 0-Inactive')->default(1);
            $table->timestamps();
        });
        // CustomerReview::create(['description' => 'Branch1', 'rating' => 5, 'product_id' => 1, 'customer_id' => 1, 'created_at' => now(),]);
        // CustomerReview::create(['description' => 'Branch2', 'rating' => 4, 'product_id' => 2,'customer_id'=>1, 'created_at' => now(),]);
        // CustomerReview::create(['description' => 'Branch3', 'rating' => 3, 'product_id' => 1,'customer_id'=>2, 'created_at' => now(),]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_reviews');
    }
};
