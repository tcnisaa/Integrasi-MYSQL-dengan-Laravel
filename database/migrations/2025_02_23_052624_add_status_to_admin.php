<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('admin', function (Blueprint $table) {
            if (!Schema::hasColumn('admin', 'status')) { // Cek apakah kolom sudah ada
                $table->string('status')->nullable(); // Tambahkan kolom hanya jika belum ada
            }
        });
    }

    public function down()
    {
        Schema::table('admin', function (Blueprint $table) {
            if (Schema::hasColumn('admin', 'status')) {
                $table->dropColumn('status'); // Hapus kolom jika ada
            }
        });
    }
};
