<?php

use App\Models\Seller;
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
        Schema::create('sellers', function (Blueprint $table) {
           $table->bigIncrements('id');
           $table->string('request_id')->nullable();
           $table->string('name',255);
           $table->string('name_ar',255);
           $table->string('legal_name');
           $table->string('email')->unique();
           $table->string('phone')->nullable();
           $table->string('password');
           $table->timestamp('email_verified_at')->nullable();
        //    $table->string('last_name');
           $table->string('building_no')->nullable();
           $table->string('street')->nullable();
           $table->string('district')->nullable();
           $table->string('city')->nullable();
           $table->string('postal_code')->nullable();
           $table->string('country')->nullable();
           $table->string('glocation')->nullable();
           $table->string('id_doc')->nullable();
           $table->string('id_number')->nullable();
           $table->string('license_doc')->nullable();
           $table->string('license_number')->nullable();
           $table->string('registration_doc')->nullable();
           $table->string('registration_number')->nullable();
           $table->text('image')->nullable();
           $table->boolean('is_by_customer')->comment('1-customer,0-admin')->default(0);
           $table->foreignId('customer_id')->nullable();
           $table->foreign('customer_id')->references('id')->on('customers')->cascadeOnDelete();
        //    $table->string('business_email')->nullable();
        //    $table->string('vat_number')->nullable();
        //    $table->string('vat_scan')->nullable();
        //    $table->string('cr_number')->nullable();
        //    $table->string('cr_scan')->nullable();
           $table->unsignedBigInteger('bank_id')->nullable();
           $table->foreign('bank_id')->references('id')->on('banks');
           $table->string('branch_name')->nullable();
           $table->string('iban_number')->nullable();
           $table->string('account_number')->nullable();
           $table->string('meta_title')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('slug')->nullable();
            $table->boolean('status')->comment('1-Active 0-Inactive')->default(0);
           $table->foreignId('created_by')->nullable();
           $table->foreign('created_by')->references('id')->on('users')->cascadeOnDelete();
           $table->rememberToken();
           $table->timestamps();
        });
        Seller::create(['request_id'=>'RQ01','name' => 'Route KSA', 'name_ar' => 'Route KSA', 'legal_name' => 'Route KSA', 'email' => 'seller@route.sa','password' => Hash::make('123456'), 'phone'=> '9809373736','email_verified_at'=>'2022-01-02 17:04:58', 'building_no' => 'KM-14B', 'street' => 'Kuruppath', 'district' => 'Malappuram', 'city' => 'Kondotty', 'postal_code' => '673638','country'=>'KSA','glocation'=>'google Location','image' => '','id_number' => '123456','license_number' => '85698','registration_number' => '12548','is_by_customer'=>1,'customer_id'=>2,'bank_id'=>1,'created_by'=>1,'created_at' => now(),]);
        Seller::create(['request_id'=>'RQ02','name' => 'ABC Technologies', 'name_ar' => 'ABC Technologies', 'legal_name' => 'ABC Technologies', 'email' => 'abc@route.sa','password' => Hash::make('123456'), 'phone'=> '9809373738','email_verified_at'=>'2022-01-02 17:04:58', 'building_no' => 'KM-14B', 'street' => 'Kuruppath', 'district' => 'Malappuram', 'city' => 'Kondotty', 'postal_code' => '673638','country'=>'India','glocation'=>'google Location','image' => '','id_number' => '852321','license_number' => '52635','registration_number' => '32654','is_by_customer'=>1,'customer_id'=>1,'bank_id'=>2,'created_by'=>1,'created_at' => now(),'status'=>1]);
        Seller::create(['request_id'=>'RQ03','name' => 'XYZ Technologies', 'name_ar' => 'XYZ Technologies', 'legal_name' => 'XYZ Technologies', 'email' => 'xyz@route.sa','password' => Hash::make('123456'), 'phone'=> '9809373737','email_verified_at'=>'2022-01-02 17:04:58', 'building_no' => 'KM-14B', 'street' => 'Kuruppath', 'district' => 'Malappuram', 'city' => 'Kondotty', 'postal_code' => '673638','country'=>'India','glocation'=>'google Location','image' => '','id_number' => '852321','license_number' => '52635','registration_number' => '32654','is_by_customer'=>1,'customer_id'=>1,'bank_id'=>2,'created_by'=>1,'created_at' => now(),'status'=>1]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sellers');
    }
};
