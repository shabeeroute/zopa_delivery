<?php

use App\Models\BranchTicket;
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
        Schema::create('branch_tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ticket_id')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->foreignId('branch_id');
            $table->foreign('branch_id')->references('id')->on('branches')->cascadeOnDelete();
            $table->tinyInteger('status')->comment('1-Warehouse Posted 2-Admin Replied')->default(1);
            $table->boolean('approve')->comment('1-Approve 0-Disapprove')->default(1);
            $table->timestamps();
        });

        BranchTicket::create(['ticket_id'=>'BT1-2023','title' => 'Please make an Urgent call', 'description' => 'asdf asdfas asdfasd asfads asdfas', 'branch_id'=> 1,'created_at' => now(),]);
        BranchTicket::create(['ticket_id'=>'BT2-2023','title' => 'Please make an Urgent call2', 'description' => '123 asdf asdfas asdfasd asfads asdfas', 'branch_id'=> 1,'created_at' => now(),]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branch_tickets');
    }
};
