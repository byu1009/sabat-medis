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
        Schema::create('counter_regs', function (Blueprint $table) {
            $table->string('counter_reg', 30);
            $table->date('counter_date');
            $table->time('counter_time');
            $table->string('counter_prefix', 2);
            $table->string('counter_num', 3);
            $table->string('counter_queue', 4);
            $table->enum('counter_eksekutif', ['0', '1']);
            $table->enum('counter_status', ['0', '1', '2'])->default('0');
            $table->unsignedBigInteger('counter_user')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('counter_regs');
    }
};
