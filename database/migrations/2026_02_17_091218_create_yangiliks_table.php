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
     Schema::table('yangiliklar', function (Blueprint $table) {
            $table->string('sarlavha', 255)->after('id');
            $table->longText('matn')->nullable()->after('sarlavha');
            $table->string('cta_text', 60)->nullable()->after('matn');
            $table->string('cta_url', 255)->nullable()->after('cta_text');
            $table->string('rasm', 255)->nullable()->after('cta_url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('yangiliklar', function (Blueprint $table) {
            $table->dropColumn(['sarlavha','matn','cta_text','cta_url','rasm']);
        });
    }
};
