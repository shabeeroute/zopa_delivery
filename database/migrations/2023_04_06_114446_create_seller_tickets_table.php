<?php

use App\Models\SellerTicket;
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
        Schema::create('seller_tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('type')->default(1)->comment('1:Technical, 2:Sales, 3: Complaints');
            $table->smallInteger('escalation_level')->default(1)->comment('1:Agent, 2:Management, 3: Executive');
            $table->string('ticket_id')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->foreignId('seller_id');
            $table->foreign('seller_id')->references('id')->on('sellers')->cascadeOnDelete();
            $table->tinyInteger('status')->comment('1-Customer Posted 2-Admin Replied')->default(1);
            $table->boolean('approve')->comment('1-Approve 0-Disapprove')->default(1);
            $table->foreignId('handler');
            $table->foreign('handler')->references('id')->on('users')->cascadeOnDelete();
            $table->timestamps();
        });
        SellerTicket::create(['type'=>1,'escalation_level'=>1,'ticket_id'=>'VT1-2023','title' => 'Please make an Urgent call', 'description' => 'asdf asdfas asdfasd asfads asdfas', 'seller_id'=> 1, 'handler'=>2,'created_at' => now(),]);
        SellerTicket::create(['type'=>1,'escalation_level'=>2,'ticket_id'=>'VT2-2023','title' => 'Please make an Urgent call2', 'description' => '123 asdf asdfas asdfasd asfads asdfas', 'seller_id'=> 1, 'handler'=>2,'created_at' => now(),]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('seller_tickets');
    }
};
