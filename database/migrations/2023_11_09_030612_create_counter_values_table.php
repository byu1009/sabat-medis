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
        Schema::create('counter_values', function (Blueprint $table) {
            $table->smallIncrements('cvalue_id');

            $table->string('cvalue_name');
            $table->string('cvalue_image')->nullable();
            $table->text('cvalue_desc')->nullable();
            $table->text('cvalue_link')->nullable();
            $table->string('cvalue_prefix', 2)->nullable();
            $table->smallInteger('cvalue_number')->default('0');
            $table->enum('cvalue_status', ['0', '1'])->default('0');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counter_values');
    }
};
