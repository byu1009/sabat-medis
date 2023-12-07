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
        Schema::create('system_secrets', function (Blueprint $table) {
            $table->id();

            $table->string('secr_used', 10);
            $table->string('secr_url_local')->nullable();
            $table->string('secr_url_target')->nullable();
            $table->string('secr_const_id')->nullable();
            $table->string('secr_secret_key')->nullable();
            $table->string('secr_user_key')->nullable();
            $table->enum('secr_status', ['0', '1'])->default('0');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system_secrets');
    }
};
