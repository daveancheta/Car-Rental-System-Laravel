<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->string('customer_user_id');
            $table->string('crn_id')->unique();
            $table->string('customer_first_name');
            $table->string('customer_middle_name')->nullable();
            $table->string('customer_last_name');
            $table->string('customer_suffix')->nullable();
            $table->string('customer_region');
            $table->string('customer_city');
            $table->string('customer_barangay');
            $table->string('customer_additional_address');
            $table->string('customer_valid_id_photo');
            $table->string('customer_profile')->nullable();
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->date('rent_start_date');
            $table->date('rent_end_date');
            $table->string('car_id');
            $table->string('car_name');
            $table->string('car_price');
            $table->string('car_image');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};
