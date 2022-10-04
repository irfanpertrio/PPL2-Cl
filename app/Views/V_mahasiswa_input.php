<h2>Form Input Mahasiswa</h2>
<form action="/mahasiswa/input" method="POST">
    <?php echo csrf_field(); ?>
    <table width="25%" border="0" align="center">

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
    </table>
    <br>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>