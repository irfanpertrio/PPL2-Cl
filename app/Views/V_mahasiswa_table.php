<div>
    <center>

        <?php if (session()->getFlashdata('pesan')) : ?>
            <script>
                alert('<?php session()->getFlashdata('pesan'); ?>')
            </script>
        <?php endif ?>

        <form action="/mahasiswa/search" method="GET">
            <input type="text" placeholder="Search..." name="nama">
            <input type="submit" value="search">
            <input type="submit" value="Reset">
        </form>

        <table border="2" style="width:50%; margin-top:25px">
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Umur</th>
                <th colspan="3">Action</th>
            </tr>

            <?php foreach ($mahasiswa as $row) 
            { ?>
                <tr>
                    <td align="center">
                        <?php echo $row['NIM'] ?>
                    </td>
                    <td>
                        <?php echo $row['Nama'] ?>
                    </td>
                    <td align="center">
                        <?php echo $row['Umur'] ?>
                    </td>
                    <td align="center">
                        <button><?php anchor('mahasiswa/detail/' . $row['id'], 'View') ?></button>
                    </td>
                    <td align="center">
                        <button><?php anchor('mahasiswa/form_update/' . $row['id'], 'Edit') ?></button>
                    </td>
                    <td align="center">
                        <button><?php anchor('mahasiswa/delete/' . $row['id'], 'Delete') ?></button>
                    </td>
                </tr>
            <?php
            } ?>
        </table>

        <br>
        <a href="/mahasiswa/form_input">
            <button>Input Data Mahasewa</button>
        </a>

    </center>
</div>