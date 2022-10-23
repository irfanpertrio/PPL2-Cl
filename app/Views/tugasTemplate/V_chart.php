<!--
==================================================
Chart Content
================================================== -->
<?php echo view($navbar); ?>

<!-- Trending Section -->
<div class="col-md-12">
    <div class="trending">
        <h3>Chart Umur Mahasiswa</h3>
        <ul class="trending-post">
            <li>
                <canvas id="myChart"></canvas>
                <?php
                $nama_mahasiswa = "";
                $umur_mahasiswa = null;
                foreach ($mahasiswa as $m) {
                    $umur = $m['Umur'];
                    $umur_mahasiswa .= "$umur" . ", ";
                }
                foreach ($nama as $n) {
                    $nama = $n['Nama'];
                    $nama_mahasiswa .= "'$nama'" . ", ";
                }
                ?>
            </li>
        </ul>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php echo ($nama_mahasiswa) ?>],
                datasets: [{
                    label: 'Data Umur Mahasiswa ',
                    backgroundColor: ['#00FFFF', '#FF1493', '#FFD700', '#6495ED', '#6495ED'],
                    borderColor: '#000',
                    data: [<?php echo $umur_mahasiswa; ?>]
                }]
            },

            options: {
                scales: {
                    x: {
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        suggestedMax: 30,
                        beginAtZero: true,
                        ticks: {
                            maxTicksLimit: 100,
                        },
                        grid: {
                            drawBorder: false,
                        },
                    },
                }
            }
        });
    </script>

    <?php echo view($footer); ?>