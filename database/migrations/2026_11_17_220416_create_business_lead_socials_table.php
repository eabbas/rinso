
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('business_lead_socials', function (Blueprint $table) {
            $table->id();

            $table->foreignId('business_lead_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('platform', 50);
            $table->string('address');

            $table->timestamps();

            $table->unique(['business_lead_id', 'platform']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('business_lead_socials');
    }
};
