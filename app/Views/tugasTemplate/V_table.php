<!--
==================================================
Table Mahasiswa Content
================================================== -->
<?php echo view($navbar); ?>

<?php if (session()->getFlashdata('pesan')) : ?>
    <script>
        alert('<?php echo session()->getFlashdata('pesan'); ?>')
    </script>
<?php endif ?>

<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-offset-1 col-md-10">
            <div class="panel">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <h4 class="title pull-left">TABEL MAHASISWA</h4>
                            <form action="/mahasiswa/search" method="GET">
                                <div class="d-flex form-inputs">
                                    <input class="form-control" type="text" placeholder="Cari mahasiswa..." name="nama">
                                    <i class="fa fa-search"></i>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel-body table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Foto</th>
                                <th>NIM</th>
                                <th>Nama</th>
                                <th>Umur</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($mahasiswa as $row) { ?>
                                <tr>
                                    <?php
                                    if ($row['Foto'] == 0) {
                                        echo "<td><center>Belum ada foto</td>";
                                    } else {
                                        echo "<td><center> <img src='images/mahasiswa/$row[Foto]' width='120' height='90'></td>";
                                    } ?>
                                    <td><?php echo $row['NIM'] ?></td>
                                    <td><?php echo $row['Nama'] ?></td>
                                    <td><?php echo $row['Umur'] ?></td>
                                    <td>
                                        <ul class="action-list">
                                            <li><a href="<?php echo '/mahasiswa/detail/' . $row['id']; ?>" class="btn btn-success"><i class="fa fa-search"></i></a></li>
                                            <li><a href="<?php echo '/mahasiswa/form_update/' . $row['id']; ?>" class="btn btn-primary"><i class="fa fa-pencil"></i></a></li>
                                            <li><a href="<?php echo '/mahasiswa/delete/' . $row['id']; ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></li>
                                        </ul>
                                    </td>
                                </tr>
                            <?php
                            } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<section id="button">
    <div class="contact-form">
        <div class="height d-flex justify-content-center align-items-center">
            <button type="button" class="btn btn-default btn-send hvr-bounce-to-right" data-toggle="modal" data-target="#formTambahData">
                Tambah Data Mahasiswa
            </button>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="formTambahData" tabindex="-1" aria-labelledby="formTambahLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header float-right">
                <h5>Form Tambah Data Mahasiswa</h5>
                <div class="text-right">
                    <i data-dismiss="modal" aria-label="Close" class="fa fa-close"></i>
                </div>
            </div>
            <form action="/mahasiswa/input" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div>
                        <table class="table">
                            <tr>
                                <td>Nama</td>
                                <td><input type="text" id="nama" name="nama" placeholder="Nama"></td>
                            </tr>
                            <tr>
                                <td>NIM</td>
                                <td><input type="number" id="nim" name="nim" placeholder="NIM"></td>
                            </tr>
                            <tr>
                                <td>Umur</td>
                                <td><input type="number" id="umur" name="umur" placeholder="Umur"></td>
                            </tr>
                            <tr>
                                <td>
                                    Foto
                                </td>
                                <td>
                                    <form method="POST" action="/mahasiswa/input" enctype="multipart/form-data">
                                        <div>
                                            <input type="file" name="foto">
                                        </div>
                                    </form>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php echo view($footer); ?>