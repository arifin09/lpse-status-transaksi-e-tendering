<?php namespace Bantenprov\StatusTransaksiEtendering\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The StatusTransaksiEtendering facade.
 *
 * @package Bantenprov\StatusTransaksiEtendering
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class StatusTransaksiEtendering extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'status-transaksi-e-tendering';
    }
}
