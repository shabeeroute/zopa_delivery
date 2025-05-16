<?php

use App\Http\Utilities\Utility;
use App\Models\Branch;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
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
        Schema::create('branches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',255);
            $table->string('name_ar',255);
            $table->string('phone',255)->nullable();
            $table->string('email',255)->nullable();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('building_no')->nullable();
            $table->string('street')->nullable();
            $table->string('district')->nullable();
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country')->nullable();
            $table->string('image')->nullable();
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            // $table->foreignId('seller_id');
            // $table->foreign('seller_id')->references('id')->on('sellers')->cascadeOnDelete();
            // $table->unsignedBigInteger('bank_id')->nullable();
            // $table->foreign('bank_id')->references('id')->on('banks');
            // $table->string('bank_branch')->nullable();
            // $table->string('iban_number')->nullable();
            // $table->string('account_number')->nullable();
            $table->boolean('status')->comment('1-Active 0-Inactive')->default(1);
            $table->foreignId('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users')->cascadeOnDelete();
            $table->rememberToken();
            $table->timestamps();
        });
        Branch::create(['name' => 'Warehouse 1', 'name_ar' => 'Warehouse 1', 'phone'=>'1234567890', 'email' => 'warehouse@route.sa','password' => Hash::make('123456'),'email_verified_at'=>'2022-01-02 17:04:58', 'building_no' => 'KM-14B', 'street' => 'Kuruppath', 'district' => 'Malappuram', 'city' => 'Jeddah', 'postal_code' => '22233','country'=>'India', 'image' => '', 'status' => 1,'image' => '', 'customer_id' => 1, 'created_by' => Utility::ADMIN_ID, 'created_at' => now(),]);
        Branch::create(['name' => 'Warehouse 2', 'name_ar' => 'Warehouse 2', 'phone'=>'1234567890', 'email' => 'test2@test.com','password' => Hash::make('123456'),'email_verified_at'=>'2022-01-02 17:04:58', 'building_no' => 'KM-14B', 'street' => 'Kuruppath', 'district' => 'Malappuram', 'city' => 'Dammam', 'postal_code' => '34223','country'=>'KSA', 'image' => '', 'status' => 1,'image' => '', 'customer_id' => 1, 'created_by' => Utility::ADMIN_ID, 'created_at' => now(),]);
        Branch::create(['name' => 'Warehouse 3', 'name_ar' => 'Warehouse 3', 'phone'=>'1234567890', 'email' => 'test3@test.com','password' => Hash::make('123456'),'email_verified_at'=>'2022-01-02 17:04:58', 'building_no' => 'KM-14B', 'street' => 'Kuruppath', 'district' => 'Malappuram', 'city' => 'Riyadh', 'postal_code' => '12271','country'=>'India', 'image' => '', 'status' => 1,'image' => '', 'customer_id' => 2, 'created_by' => Utility::ADMIN_ID, 'created_at' => now(),]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('branches');
    }
};
