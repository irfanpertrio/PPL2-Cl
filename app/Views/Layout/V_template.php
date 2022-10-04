<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Home</title>
</head>

<body>
    <table border=1 align="center" width="100%">
        <thead>
            <tr>
                <th height=100>
                    <h3> HEADER </h3>
                </th>
            </tr>
            <tr>
                <th>
                    <h3 align="left">
                        <?php echo anchor('dashboard', "Home") ?>
                        <?php echo anchor('mahasiswa', "Mahasiswa") ?>
                        <?php echo anchor('logout', "Logout") ?>
                    </h3>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr height=500>
                <th>
                    <h3><?php echo view($content_view) ?><h3>
                </th>
            </tr>
        </tbody>
        <tfoot>
            <tr height=100 align="center">
                <td>
                    <h3>FOOTER</h3>
                </td>
            </tr>
        </tfoot>
    </table>
</body>

</html>