<?php echo view($navbar); ?>

<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css /> -->
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-offset-1 col-md-10">
            <div class="panel">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-sm-12 col-xs-6">
                            <h4 class="title pull-left">DATA <?php echo $mahasiswa['Nama'] ?></h4>
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
                                <td><?php echo $mahasiswa['NIM'] ?></td>
                                <td><?php echo $mahasiswa['Nama'] ?></td>
                                <td><?php echo $mahasiswa['Umur'] ?></td>
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
            <a href="/mahasiswa"><button type="button" class="btn btn-default btn-back hvr-bounce-to-right">
                    Kembali
                </button></a>
        </div>
    </div>
</section>

<?php echo view($footer); ?>