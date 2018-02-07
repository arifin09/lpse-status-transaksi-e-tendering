<?php

namespace Bantenprov\StatusTransaksiEtendering\Models\Bantenprov\StatusTransaksiEtendering;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusTransaksiEtendering extends Model
{

    protected $table = 'lpse_status_transaksi_e_tenderings';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('negara', 'province_id', 'kab_kota', 'regency_id', 'tahun', 'data');

    public function getProvince()
    {
        return $this->hasOne('Bantenprov\StatusTransaksiEtendering\Models\Bantenprov\StatusTransaksiEtendering\Province','id','province_id');
    }

    public function getRegency()
    {
        return $this->hasOne('Bantenprov\StatusTransaksiEtendering\Models\Bantenprov\StatusTransaksiEtendering\Regency','id','regency_id');
    }

}

