<?php

use App\Models\Delivery;
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
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('driver_id')->nullable();
            $table->foreign('driver_id')->references('id')->on('drivers')->cascadeOnDelete();
            $table->morphs('deliverable');
            // $table->foreignId('sale_item_id');
            // $table->foreign('sale_item_id')->references('id')->on('sales_items')->cascadeOnDelete();
            $table->double('delivery_charge')->default(0);
            $table->string('glocation_pickup')->nullable();
            $table->string('glocation_delivery')->nullable();
            $table->date('delivery_est_at')->nullable();
            $table->date('accepted_at')->nullable();
            $table->string('reason')->nullable();
            $table->date('rejected_at')->nullable();
            $table->smallInteger('status')->comment('0:New, 1:accept, 2:reject, 7:picked, 5:out for delivery, 5:out for pick up, 7:picked up, 6:delivered, 11:return to warehouse');
            // COMMENT:when driver "accepts" status of sale_item change to "ready to ship" and when "picked"  sale_item change to "despatch"
            $table->timestamps();
        });

        Delivery::create(['driver_id' => 1, 'deliverable_id'=>5, 'deliverable_type'=>'App\Models\SalesItem', 'delivery_charge' => 10, 'glocation_pickup' => 'Location', 'glocation_delivery'=>'Location', 'delivery_est_at'=>'2023-10-13 06:36:36', 'status' => 1, 'created_at' => now(),]);
        Delivery::create(['driver_id' => 2, 'deliverable_id'=>6, 'deliverable_type'=>'App\Models\SalesItem', 'delivery_charge' => 10, 'glocation_pickup' => 'Location', 'glocation_delivery'=>'Location', 'delivery_est_at'=>'2023-10-14 06:36:36', 'status' => 11, 'created_at' => now(),]);
        Delivery::create(['driver_id' => 3, 'deliverable_id'=>1, 'deliverable_type'=>'App\Models\ReturnSale', 'delivery_charge' => 10, 'glocation_pickup' => 'Location', 'glocation_delivery'=>'Location', 'delivery_est_at'=>'2023-10-14 06:36:36', 'status' => 1, 'created_at' => now(),]);
        Delivery::create(['driver_id' => 2, 'deliverable_id'=>7, 'deliverable_type'=>'App\Models\SalesItem', 'delivery_charge' => 10, 'glocation_pickup' => 'Location', 'glocation_delivery'=>'Location', 'delivery_est_at'=>'2023-10-14 06:36:36', 'status' => 6, 'created_at' => now(),]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deliveries');
    }
};
