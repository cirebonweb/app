<?= $this->extend('layout/template') ?>

<?= $this->section("css") ?>
<link rel="stylesheet" href="<?= base_url('plugin/datatables/datatables.min.css') ?>">
<link rel="stylesheet" href="<?= base_url('plugin/datatables/cirebonweb_tabel.min.css') ?>">
<?= $this->endSection() ?>

<?= $this->section('konten') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <!-- <table id="tabelData" class="table table-bordered table-hover dataTable dtr-inline"> -->
                        <table id="tabelData" class="table table-bordered table-hover mb-3">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Server</th>
                                    <th class="">Lokasi Server</th>
                                    <th class="">Sisa Akun</th>
                                    <th class="">Akun Limit</th>
                                    <th class="">Akun Aktif</th>
                                    <th class="">Awal Sewa</th>
                                    <th class="">Akhir Sewa</th>
                                    <th class="">Durasi Sewa</th>
                                    <th class="">Biaya Sewa</th>
                                    <th class="none">Aktivasi</th>
                                    <th class="none">IP Server</th>
                                    <th class="none">OS Server</th>
                                    <th class="none">Versi cPanel</th>
                                    <th class="none">Url Status</th>
                                    <th class="none">Nameserver 1</th>
                                    <th class="none">Nameserver 2</th>
                                    <th class="none">Nameserver 3</th>
                                    <th class="none">Nameserver 4</th>
                                    <th class="none">Dibuat</th>
                                    <th class="none">Dirubah</th>
                                    <th class="none">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div> <!-- .card-body -->
                </div> <!-- .card -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</section>
<?= $this->endSection() ?>

<?= $this->section('js') ?>
<script src="<?= base_url('plugin/datatables/datatables.min.js') ?>" defer></script>
<script src="<?= base_url('page/api_server.min.js') ?>" defer></script>
<?= $this->endSection() ?>