<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DokumenPersil extends Model
{
    protected $table = 'dokumen_persil';
    protected $primaryKey = 'dokumen_id';

    protected $fillable = [
        'persil_id',
        'jenis_dokumen',
        'nomor_dokumen',
        'tanggal_dokumen',
        'file_path',
        'keterangan',
    ];

    protected $casts = [
        'tanggal_dokumen' => 'date',
    ];

    public function persil(): BelongsTo
    {
        return $this->belongsTo(Persil::class, 'persil_id', 'persil_id');
    }
}
