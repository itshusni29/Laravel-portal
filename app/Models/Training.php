<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;


class Training extends Model
{
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
}
