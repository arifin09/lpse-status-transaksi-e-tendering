<?php

Route::group(['prefix' => 'status-transaksi-e-tendering', 'middleware' => ['web']], function() {

    $controllers = (object) [
        'index'     => 'Bantenprov\StatusTransaksiEtendering\Http\Controllers\StatusTransaksiEtenderingController@index',
        'create'     => 'Bantenprov\StatusTransaksiEtendering\Http\Controllers\StatusTransaksiEtenderingController@create',
        'store'     => 'Bantenprov\StatusTransaksiEtendering\Http\Controllers\StatusTransaksiEtenderingController@store',
        'show'      => 'Bantenprov\StatusTransaksiEtendering\Http\Controllers\StatusTransaksiEtenderingController@show',
        'update'    => 'Bantenprov\StatusTransaksiEtendering\Http\Controllers\StatusTransaksiEtenderingController@update',
        'destroy'   => 'Bantenprov\StatusTransaksiEtendering\Http\Controllers\StatusTransaksiEtenderingController@destroy',
    ];

    Route::get('/',$controllers->index)->name('status-transaksi-e-tendering.index');
    Route::get('/create',$controllers->create)->name('status-transaksi-e-tendering.create');
    Route::post('/store',$controllers->store)->name('status-transaksi-e-tendering.store');
    Route::get('/{id}',$controllers->show)->name('status-transaksi-e-tendering.show');
    Route::put('/{id}/update',$controllers->update)->name('status-transaksi-e-tendering.update');
    Route::post('/{id}/delete',$controllers->destroy)->name('status-transaksi-e-tendering.destroy');

});

