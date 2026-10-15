<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DapurSPPG extends Model
{
    use HasFactory;
    
    protected $table = 'dapur_sppg';

    protected $fillable = [
        'nama_dapur',
        'foto',
        'alamat',
        'tgl_berdiri',
    ];

    public function sekolah(): HasMany
    {
        return $this->hasMany(Sekolah::class, 'dapur_sppg_id', 'id');
    }
}