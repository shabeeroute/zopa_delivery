<?php

use App\Models\Supplier;
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
        Schema::create('suppliers', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->string('email')->unique();
           $table->string('phone')->nullable();
           $table->string('name');
           $table->string('name_ar');
           $table->string('building_no')->nullable();
           $table->string('street')->nullable();
           $table->string('district')->nullable();
           $table->string('city')->nullable();
           $table->string('postal_code')->nullable();
           $table->text('image')->nullable();
           $table->string('legal_name');
           $table->string('legal_name_ar');
           $table->string('business_email')->nullable();
           $table->string('vat_number')->nullable();
           $table->string('cr_number')->nullable();
           $table->boolean('status')->comment('1-Active 0-Inactive')->default(1);
           $table->foreignId('user_id')->nullable();
           $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
           $table->timestamps();
        });
        Supplier::create(['name' => 'Shabeer', 'name_ar' => 'CM', 'city'=> 'Kondotty', 'email' => 'shabeer@gmail.com','legal_name' => 'Shabeer','legal_name_ar' => 'Shabeer','phone'=>'9809373738','image' => '','created_at' => now(),]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suppliers');
    }
};
