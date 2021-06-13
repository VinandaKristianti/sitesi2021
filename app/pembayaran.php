<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pembayaran extends Model
{
    protected $table = 'pembayaran';
    protected $fillable = ['nama','bank','tgl_kirim','bukti_bayar'];
    protected $primaryKey = 'id_bayar';
}
