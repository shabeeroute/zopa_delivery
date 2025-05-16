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
        Schema::create('driver_return_sale', function (Blueprint $table) {
            //TODO: need to delete this table. this table is substitute for deliveries
            $table->id();
            $table->foreignId('driver_id');
            $table->foreign('driver_id')->references('id')->on('drivers')->cascadeOnDelete();
            $table->foreignId('return_sale_id');
            $table->foreign('return_sale_id')->references('id')->on('return_sales')->cascadeOnDelete();
            $table->date('accepted_at')->nullable();
            $table->string('reason')->nullable();
            $table->date('rejected_at')->nullable();
            $table->smallInteger('status')->comment('0:new, 1:accept, 2:reject, 3:out for pick up, 4:picked up, 5:return to warehouse');
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
        Schema::dropIfExists('driver_return_sale');
    }
};
