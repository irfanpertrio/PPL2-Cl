<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Home</title>
</head>

<body>
    <table border=1 align="center" width="100%" style="overflow-x:auto; overflow-y:auto;">
        <thead>
            <tr>
                <th style="font-size:1.1vw; height: 7vw;">
                    <h3> HEADER </h3>
                </th>
            </tr>
            <tr>
                <th>
                    <h3 align=" left" style="font-size:1.4vw;">
                        <?php echo anchor('dashboard/temp', "Home") ?>
                        <?php echo anchor('mahasiswa/temp', "Mahasiswa") ?>
                        <?php echo anchor('dashboard', "Template") ?>
                        <?php echo anchor('logout', "Logout") ?>
                    </h3>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr style="height: 35vw;">
                <th>
                    <h3><?php echo view($content_view) ?><h3>
                </th>
            </tr>
        </tbody>
        <tfoot>
            <tr style="font-size:1.1vw; height: 7vw;" align="center">
                <td>
                    <h3>FOOTER</h3>
                </td>
            </tr>
        </tfoot>
    </table>
</body>

</html>