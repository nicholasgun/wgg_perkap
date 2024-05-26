<?php

namespace App\Models;

use CodeIgniter\Model;

class PanitiaModel extends Model
{
    protected $table            = 'panitia';
    protected $useSoftDeletes   = true;
    protected $allowedFields    = ['nama', 'nrp', 'divisi', 'deleted_at'];

    // Dates

    public function getNamaByNrp($nrp)
    {
        $panitia = $this
            ->where('nrp', strtoupper($nrp))
            ->first();
        if ($panitia) return $panitia['nama'];
        return null;
    }

    public function isPanitia($nrp)
    {
        $panitia = $this
            ->where('nrp', strtoupper($nrp))
            ->first();
        return $panitia != null;
    }
}
