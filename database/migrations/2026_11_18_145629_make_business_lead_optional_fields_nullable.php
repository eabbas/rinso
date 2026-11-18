<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('business_leads', function (Blueprint $table) {
            $table->date('birth_date')->nullable()->change();

            $table->string('business_age')->nullable()->change();
            $table->boolean('has_store')->nullable()->change();
            $table->string('store_address')->nullable()->change();

            $table->boolean('has_website')->nullable()->change();
            $table->string('website_url', 2048)->nullable()->change();
            $table->string('website_age')->nullable()->change();

            $table->boolean('has_sellers')->nullable()->default(null)->change();
            $table->boolean('has_admin')->nullable()->default(null)->change();

            $table->boolean('stores_customer_data')->nullable()->change();
            $table->unsignedTinyInteger('repeat_purchase_percent')->nullable()->change();
            $table->boolean('repeat_purchase_unknown')->nullable()->default(null)->change();

            $table->text('digital_obstacles')->nullable()->change();
            $table->text('time_constraints')->nullable()->change();
        });

        Schema::table('business_lead_socials', function (Blueprint $table) {
            $table->string('platform')->nullable()->change();
            $table->string('address', 2048)->nullable()->change();
        });

        Schema::table('business_lead_sellers', function (Blueprint $table) {
            $table->string('first_name')->nullable()->change();
            $table->string('last_name')->nullable()->change();
            $table->string('phone')->nullable()->change();
            $table->date('birth_date')->nullable()->change();
        });

        Schema::table('business_lead_value_propositions', function (Blueprint $table) {
            $table->string('title')->nullable()->change();
        });

        Schema::table('business_lead_sales_problems', function (Blueprint $table) {
            $table->text('description')->nullable()->change();
        });

        Schema::table('business_lead_cooperations', function (Blueprint $table) {
            $table->string('title')->nullable()->change();
        });

        // اگر جدول معرفی‌شدگان قبلاً ساخته شده، این قسمت را دوباره اجرا نکن.
        if (! Schema::hasTable('business_lead_referrals')) {
            Schema::create('business_lead_referrals', function (Blueprint $table) {
                $table->id();
                $table->foreignId('business_lead_id')
                    ->constrained('business_leads')
                    ->cascadeOnDelete();
                $table->string('name')->nullable();
                $table->timestamps();
            });
        } else {
            Schema::table('business_lead_referrals', function (Blueprint $table) {
                $table->string('name')->nullable()->change();
            });
        }
    }

    public function down(): void
    {
        // این مایگریشن عمداً برگشت خودکار به NOT NULL ندارد؛
        // چون ممکن است رکوردهای ثبت‌شده در ستون‌های اختیاری مقدار NULL داشته باشند.
    }
};