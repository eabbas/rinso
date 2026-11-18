
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('business_leads', function (Blueprint $table) {
            $table->id();

            // Personal information
            // $table->string('first_name');
            // $table->string('last_name');
            // $table->string('phone', 20)->index();
            // $table->date('birth_date')->nullable();
            // $table->string('job_title');

            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone', 20)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('job_title')->nullable();
            $table->string('team')->nullable();

            // Business information
            $table->string('business_age')->nullable();

            $table->boolean('has_store')->default(false);
            $table->text('store_address')->nullable();

            $table->boolean('has_website')->default(false);
            $table->string('website_url')->nullable();
            $table->string('website_age')->nullable();

            // Customer information
            $table->boolean('stores_customer_data')->default(false);

            $table->unsignedTinyInteger('repeat_purchase_percent')->nullable();
            $table->boolean('repeat_purchase_unknown')->default(false);

            // Business challenges
            $table->text('digital_obstacles')->nullable();
            $table->text('time_constraints')->nullable();

            // Lead status
            $table->string('status')->default('new')->index();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('business_leads');
    }
};
