<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use HasFactory, SoftDeletes; // Gunakan fitur SoftDeletes

    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $fillable = ['nama_admin', 'alamat', 'username', 'password', 'no_telp'];
    protected $dates = ['deleted_at']; // Kolom soft delete
}
