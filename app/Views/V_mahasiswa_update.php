<h2>Form Update Mahasiswa</h2>
<form action="<?php echo '/mahasiswa/update/' . $mahasiswa['id'] ?>" method="POST">
    <?php csrf_field() ?>
    <table width="25%" border="0" align="center">

        <tr>
            <td>Nama</td>
            <td>
                <input type="text" name="nama" value="<?php echo ($mahasiswa['Nama']) ?>">
            </td>
        </tr>
        <tr>
            <td>NIM</td>
            <td>
                <input type="text" name="nim" value="<?php echo ($mahasiswa['NIM']) ?>">
            </td>
        </tr>
        <tr>
            <td>Umur</td>
            <td>
                <input type="number" name="umur" value="<?php echo ($mahasiswa['Umur']) ?>">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" name="simpan" value="submit">
            </td>
        </tr>

    </table>
</form>