<template>
  <div>

    <div class="card mb-3">
      <div class="card-header">Grafik Produk Domestik Regional Bruto</div>
      <div class="card-body">
        <echarts-status-transaksi-e-tendering></echarts-status-transaksi-e-tendering>
      </div><!-- /.card-body -->
    </div><!-- /.card -->

    <div class="row">
      <div class="col-md-6">
        <div class="card mb-3">
          <div class="card-header">Grafik Kota</div>
          <div class="card-body">
            <echarts-status-transaksi-e-tendering-kota></echarts-status-transaksi-e-tendering-kota>
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div>
      <div class="col-md-6">
        <div class="card mb-3">
          <div class="card-header">Grafik Tahunan</div>
          <div class="card-body">
            <echarts-status-transaksi-e-tendering-tahun></echarts-status-transaksi-e-tendering-tahun>
          </div><!-- /.card-body -->
        </div><!-- /.card -->
      </div>
    </div>

  </div>
</template>
