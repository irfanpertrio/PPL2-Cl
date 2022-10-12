<div>
    <center>

        <?php if (session()->getFlashdata('pesan')) : ?>
            <script>
                alert('<?php echo session()->getFlashdata('pesan'); ?>')
            </script>
        <?php endif ?>

        <form action="/mahasiswa/temp/search" method="GET">
            <input style="font-size:1vw;" type="text" placeholder="Search..." name="nama">
            <input style="font-size:1vw;" type="submit" value="search">
            <input style="font-size:1vw;" type="submit" value="Reset">
        </form>

        <table border="1" style="width:50%; margin-top:2vw; font-size:1.4vw;">
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Umur</th>
                <th colspan="3">Action</th>
            </tr>

            <?php foreach ($mahasiswa as $row) { ?>
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
                        <a href="<?php echo '/mahasiswa/temp/detail/' . $row['id']; ?>"><button style="font-size:1vw;">Detail</button></a>
                    </td>
                    <td align="center">
                        <a href="<?php echo '/mahasiswa/temp/form_update/' . $row['id']; ?>"><button style="font-size:1vw;">Edit</button></a>
                    </td>
                    <td align="center">
                        <a href="<?php echo '/mahasiswa/delete/' . $row['id']; ?>"><button style="font-size:1vw;">Delete</button></a>
                    </td>
                </tr>
            <?php
            } ?>
        </table>

        <a href="/mahasiswa/temp/form_input">
            <button style="font-size:1vw; margin-top:2vw;">Input Data Mahasewa</button>
        </a>

    </center>
</div>