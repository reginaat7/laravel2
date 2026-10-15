<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sekolah extends Model
{
    use HasFactory;

    protected $table = 'sekolah';

    protected $fillable = [
        'npsn',
        'nama_sekolah',
        'tingkat',
        'alamat_sekolah',
        'foto_sekolah',
        'dapur_sppg_id',
    ];

    /**
     * Relasi One-to-Many ke DapurSPPG via dapur_sppg_id
     */
    public function dapurSppg(): BelongsTo
    {
        return $this->belongsTo(DapurSPPG::class, 'dapur_sppg_id', 'id');
    }
}