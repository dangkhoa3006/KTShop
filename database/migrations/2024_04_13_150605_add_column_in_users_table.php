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
            $table->enum('gender', ['male', 'female', 'other'])->after('name')->nullable();
            $table->date('birthday')->after('gender')->nullable();
            $table->string('phone',10)->after('birthday')->nullable();
            $table->string('address',255)->after('email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gender');
            $table->dropColumn('birthday');
            $table->dropColumn('phone');
            $table->dropColumn('address');
        });
    }
};
