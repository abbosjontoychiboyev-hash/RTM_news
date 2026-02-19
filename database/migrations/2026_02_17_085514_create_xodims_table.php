<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('xodimlar', function (Blueprint $table) {
            $table->id();
            $table->string('full_name', 200);
            $table->string('phone', 50)->nullable();
            $table->string('rasm', 500)->nullable();
            $table->json('fanlar')->nullable();

            $table->time('ish_vaqti_start')->nullable();
            $table->time('ish_vaqti_end')->nullable();

            $table->time('qabul_vaqti_start')->nullable();
            $table->time('qabul_vaqti_end')->nullable();

            $table->string('qabul_xonasi', 100)->nullable();

            $table->boolean('is_director')->default(false);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('xodimlar');
    }
};
