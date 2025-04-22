<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('admin', function (Blueprint $table) {
            $table->string('no_telp')->after('username'); // Menambahkan kolom no_telp setelah username
        });
    }

    public function down()
    {
        Schema::table('admin', function (Blueprint $table) {
            $table->dropColumn('no_telp');
        });
    }
};

