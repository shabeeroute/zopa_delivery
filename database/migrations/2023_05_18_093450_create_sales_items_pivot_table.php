<?php

use App\Http\Utilities\Utility;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('sales_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('sale_id');
            $table->foreign('sale_id')->references('id')->on('sales')->cascadeOnDelete();
            $table->foreignId('product_item_id');
            $table->foreign('product_item_id')->references('id')->on('product_items')->cascadeOnDelete();
            $table->string('invoice_no')->nullable(); //TODO: should suffix and prefix in settings.
            $table->integer('quantity');
            $table->double('price');
            $table->double('vat');
            $table->double('delivery_charge')->default(0);
            $table->foreignId('rent_term_id');
            $table->foreign('rent_term_id')->references('id')->on('rent_terms')->cascadeOnDelete();
            $table->date('starts_at')->nullable();
            $table->date('ends_at')->nullable();
            $table->boolean('is_paid')->comment('1-paid,0-not paid')->default(0);
            // $table->boolean('is_delivered')->comment('1-delivered,0-not delivered')->default(0);
            $table->boolean('is_refundable')->default(1);
            $table->date('date_accepted')->nullable();
            $table->date('date_ready')->nullable();
            $table->date('date_despatched')->nullable();
            $table->date('date_out_delivery')->nullable();
            $table->date('date_delivered')->nullable();
            $table->date('date_closed')->nullable();
            $table->date('date_onhold')->nullable();
            $table->date('date_cancelled')->nullable();
            $table->smallInteger('status')->default(0)->comment('0:new, 1:accept, 2:Ready to Ship, 3:Despatched, 4:Out for delivery, 5:Delivered, 6:Closed, 7:On Hold, 8:Cancelled');
            // COMMENT:when assign to driver and driver accepts status converted to ready to ship, when driver picked up status changes to despatched
            $table->timestamps();
        });
        DB::table('sales_items')->insert([
            ['invoice_no' => '5555', 'sale_id' => 1, 'product_item_id' => 1, 'quantity'=>1, 'price'=>50, 'vat'=>5, 'rent_term_id'=>2, 'is_paid'=>1, 'starts_at'=>'2023-08-16 06:36:36','ends_at'=>'2023-08-22 06:36:36','date_delivered'=>null, 'status'=>0, 'created_at' => now(),'date_ready'=> null,'delivery_charge'=>0],
            ['invoice_no' => '5556', 'sale_id' => 2, 'product_item_id' => 2, 'quantity'=>2, 'price'=>20, 'vat'=>2,'rent_term_id'=>3, 'is_paid'=>1, 'starts_at'=>'2023-08-16 06:36:36','ends_at'=>'2023-09-15 06:36:36','date_delivered'=>null, 'status'=>0, 'created_at' => now(),'date_ready'=> null,'delivery_charge'=>0],
            ['invoice_no' => '5557', 'sale_id' => 3, 'product_item_id' => 3, 'quantity'=>1, 'price'=>20, 'vat'=>2,'rent_term_id'=>3, 'is_paid'=>1, 'starts_at'=>'2023-08-16 06:36:36','ends_at'=>'2023-09-15 06:36:36','date_delivered'=>null, 'status'=>0, 'created_at' => now(),'date_ready'=> null,'delivery_charge'=>0],
            ['invoice_no' => '5558', 'sale_id' => 4, 'product_item_id' => 2, 'quantity'=>1, 'price'=>100, 'vat'=>10,'rent_term_id'=>1, 'is_paid'=>0, 'starts_at'=>'2023-08-18 06:36:36','ends_at'=>'2023-08-19 06:36:36','date_delivered'=>null, 'status'=>0, 'created_at' => now(),'date_ready'=> null,'delivery_charge'=>0],
            ['invoice_no' => '5559', 'sale_id' => 5, 'product_item_id' => 4, 'quantity'=>2, 'price'=>100, 'vat'=>10,'rent_term_id'=>1, 'is_paid'=>1, 'starts_at'=>'2023-08-18 06:36:36','ends_at'=>'2023-08-19 06:36:36','date_delivered'=>null, 'status'=>Utility::STATUS_READY, 'created_at' => now(),'date_ready'=> '2023-08-18 06:36:36','delivery_charge'=>10],
            ['invoice_no' => '5560', 'sale_id' => 6, 'product_item_id' => 4, 'quantity'=>2, 'price'=>100, 'vat'=>10,'rent_term_id'=>1, 'is_paid'=>1, 'starts_at'=>'2023-08-18 06:36:36','ends_at'=>'2023-08-19 06:36:36','date_delivered'=> '2023-08-18 06:36:36', 'status'=>Utility::STATUS_CLOSED, 'created_at' => now(),'date_ready'=> null,'delivery_charge'=>10,],
            ['invoice_no' => '5561', 'sale_id' => 7, 'product_item_id' => 4, 'quantity'=>2, 'price'=>100, 'vat'=>10,'rent_term_id'=>1, 'is_paid'=>1, 'starts_at'=>'2023-08-18 06:36:36','ends_at'=>'2023-08-19 06:36:36','date_delivered'=> '2023-08-18 06:36:36', 'status'=>Utility::STATUS_DELIVERED, 'created_at' => now(),'date_ready'=> null,'delivery_charge'=>10,],

        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_items');
    }
};
