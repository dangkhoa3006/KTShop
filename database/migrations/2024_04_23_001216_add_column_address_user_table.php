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
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar',255)->after('id')->default("")->nullable();
            $table->integer('province_id')->after('password')->nullable();
            $table->integer('district_id')->after('province_id')->nullable();
            $table->integer('ward_id')->after('district_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('avatar');
            $table->dropColumn('province_id');
            $table->dropColumn('district_id');
            $table->dropColumn('ward_id');
        });
    }
};
