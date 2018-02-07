<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('lpse_status_transaksi_e_tenderings', function(Blueprint $table) {
			$table->foreign('province_id')->references('id')->on('provinces')
						->onDelete('set null')
						->onUpdate('restrict');
		});
		Schema::table('lpse_status_transaksi_e_tenderings', function(Blueprint $table) {
			$table->foreign('regency_id')->references('id')->on('regencies')
						->onDelete('set null')
						->onUpdate('restrict');
		});
		Schema::table('regencies', function(Blueprint $table) {
			$table->foreign('province_id')->references('id')->on('provinces')
						->onDelete('set null')
						->onUpdate('restrict');
		});
	}

	public function down()
	{
		Schema::table('lpse_status_transaksi_e_tenderings', function(Blueprint $table) {
			$table->dropForeign('lpse_status_transaksi_e_tenderings_province_id_foreign');
		});
		Schema::table('lpse_status_transaksi_e_tenderings', function(Blueprint $table) {
			$table->dropForeign('lpse_status_transaksi_e_tenderings_regency_id_foreign');
		});
		Schema::table('regencies', function(Blueprint $table) {
			$table->dropForeign('regencies_province_id_foreign');
		});
	}
}