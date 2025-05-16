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
        Schema::create('driver_sales', function (Blueprint $table) {
            //TODO: need to delete this table. this table is substitute for deliveries
            $table->id();
            $table->foreignId('driver_id')->nullable();
            $table->foreign('driver_id')->references('id')->on('drivers')->cascadeOnDelete();
            $table->morphs('saleable');
            // $table->foreignId('sale_item_id');
            // $table->foreign('sale_item_id')->references('id')->on('sales_items')->cascadeOnDelete();
            $table->date('accepted_at')->nullable();
            $table->string('reason')->nullable();
            $table->date('rejected_at')->nullable();
            $table->smallInteger('status')->comment('0:new, 1:accept, 2:reject, 3:picked, 4:out for delivery, 5:delivered');
            // COMMENT:when driver "accepts" status of sale_item change to "ready to ship" and when "picked"  sale_item change to "despatch"
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
        Schema::dropIfExists('driver_sales');
    }
};
