<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('pets', function (Blueprint $table) {
            $table->string('age')->nullable()->after('type');
            $table->text('medical_history')->nullable()->after('photo_path');
            $table->text('temperament')->nullable()->after('medical_history');
            $table->enum('status', ['available', 'pending', 'adopted'])->default('available')->after('temperament');
        });
    }

    public function down()
    {
        Schema::table('pets', function (Blueprint $table) {
            $table->dropColumn(['age', 'medical_history', 'temperament', 'status']);
        });
    }
};
