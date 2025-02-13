<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('roles', function (Blueprint $table) {
        $table->string('roles')->after('user_id'); // Tambahkan kolom role
    });
}

public function down()
{
    Schema::table('roles', function (Blueprint $table) {
        $table->dropColumn('roles');
    });
}

};
