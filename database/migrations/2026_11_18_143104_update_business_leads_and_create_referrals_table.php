<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('business_leads', function (Blueprint $table) {
            $table->boolean('has_sellers')->default(false)->after('job_title');
            $table->boolean('has_admin')->default(false)->after('has_sellers');
        });

        Schema::create('business_lead_referrals', function (Blueprint $table) {
            $table->id();

            $table->foreignId('business_lead_id')
                ->constrained('business_leads')
                ->cascadeOnDelete();

            $table->string('name', 191);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('business_lead_referrals');

        Schema::table('business_leads', function (Blueprint $table) {
            $table->dropColumn([
                'has_sellers',
                'has_admin',
            ]);
        });
    }
};