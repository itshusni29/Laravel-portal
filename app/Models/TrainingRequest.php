<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_training',
        'tanggal_training',
        'trainer',
        'jumlah_peserta',
        'tempat',
        'nama_manager',
        'nama_general_manager',
        'status',
        'manager_approve',
        'general_manager_approve',
        'hrd_approve',
        'comment_manager',
        'comment_general_manager',
        'comment_hrd',
        'penawaran_pdf',
    ];

    public function manager()
    {
        return $this->belongsTo(User::class, 'nama_manager', 'id');
    }

    public function generalManager()
    {
        return $this->belongsTo(User::class, 'nama_general_manager', 'id');
    }
}
