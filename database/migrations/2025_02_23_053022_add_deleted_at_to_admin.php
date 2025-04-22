<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('admin', function (Blueprint $table) {
            if (!Schema::hasColumn('admin', 'deleted_at')) { 
                $table->softDeletes(); // Tambah kolom deleted_at untuk soft delete
            }
        });
    }

    public function down()
    {
        Schema::table('admin', function (Blueprint $table) {
            if (Schema::hasColumn('admin', 'deleted_at')) {
                $table->dropColumn('deleted_at'); // Hapus kolom saat rollback
            }
        });
    }
};
