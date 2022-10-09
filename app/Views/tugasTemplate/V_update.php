<?php echo view($navbar); ?>

<form action="<?php echo '/mahasiswa/update/' . $mahasiswa['id'] ?>" method="POST">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-offset-1 col-md-10">
                <div class="update">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-6 col-xs-6">
                                <h4 class="title pull-left">UPDATE DATA <?php echo $mahasiswa['Nama'] ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>NIM</th>
                                    <th>Nama</th>
                                    <th>Umur</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <input type="text" name="nim" value="<?php echo ($mahasiswa['NIM']) ?>">
                                    </td>
                                    <td>
                                        <input type="text" name="nama" value="<?php echo ($mahasiswa['Nama']) ?>">
                                    </td>
                                    <td>
                                        <input type="text" name="umur" value="<?php echo ($mahasiswa['Umur']) ?>">
                                    </td>
                                </tr>
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
                <a href="/mahasiswa">
                    <button type="button" class="btn btn-default btn-back hvr-bounce-to-right">
                        Kembali
                    </button>
                </a>
                <button type="submit" class="btn btn-default btn-save hvr-bounce-to-right" name="simpan" value="submit">
                    Simpan
                </button>

            </div>
        </div>
    </section>
</form>