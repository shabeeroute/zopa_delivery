<?php

use App\Models\SaleBatch;
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
        // Schema::create('sale_batches', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('order_no')->nullable();
        //     $table->foreignId('sale_id');
        //     $table->foreign('sale_id')->references('id')->on('sales')->cascadeOnDelete();
        //     $table->boolean('is_customer')->comment('1-customer,0-branch')->default(0);
        //     $table->foreignId('branch_id')->nullable();
        //     $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
        //     $table->foreignId('customer_id')->nullable();
        //     $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
        //     $table->double('sub_total')->default(0);
        //     $table->double('vat_total')->default(0);
        //     $table->double('delivery_charge')->default(0);
        //     $table->foreignId('driver_id')->nullable();
        //     $table->foreign('driver_id')->references('id')->on('drivers')->cascadeOnDelete();
        //     $table->smallInteger('status')->default(0)->comment('0:new, 1:accepted, 2:Partially');
        //     $table->timestamps();
        // });

        // SaleBatch::create(['order_no' => 'SL1/SB01/2023', 'sale_id' => 1, 'is_customer'=>0, 'branch_id' => 1, 'sub_total' => 300, 'vat_total'=>25, 'delivery_charge'=> 30, 'driver_id'=>1, 'created_at' => now(),]);
        // SaleBatch::create(['order_no' => 'SL1/SB02/2023', 'sale_id' => 1, 'is_customer'=>0,  'branch_id' => 2, 'sub_total' => 100, 'vat_total'=>5, 'delivery_charge'=> 20, 'driver_id'=>null, 'created_at' => now(),]);
        // SaleBatch::create(['order_no' => 'SL2/SB01/2023', 'sale_id' => 2, 'is_customer'=>0,  'branch_id' => 1, 'sub_total' => 100, 'vat_total'=>5, 'delivery_charge'=> 25, 'driver_id'=>null, 'created_at' => now(),]);
        // SaleBatch::create(['order_no' => 'SL3/SB01/2023', 'sale_id' => 3, 'is_customer'=>0,  'branch_id' => 1, 'sub_total' => 200, 'vat_total'=>5, 'delivery_charge'=> 0, 'driver_id'=>null, 'created_at' => '2023-08-17 06:36:36',]);
        // SaleBatch::create(['order_no' => 'SL4/SB01/2023', 'sale_id' => 4, 'is_customer'=>1,  'branch_id' => null, 'sub_total' => 200, 'vat_total'=>5, 'delivery_charge'=> 0, 'driver_id'=>null, 'created_at' => '2023-08-17 06:36:36', 'customer_id' => 3,]);
        // SaleBatch::create(['order_no' => 'SL5/SB01/2023', 'sale_id' => 5, 'is_customer'=>1,  'branch_id' => null, 'sub_total' => 100, 'vat_total'=>5, 'delivery_charge'=> 20, 'driver_id'=>null, 'created_at' => '2023-08-17 06:36:36', 'customer_id' => 3,]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('sale_batches');
    }
};
