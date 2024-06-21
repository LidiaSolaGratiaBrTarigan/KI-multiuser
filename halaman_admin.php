<!DOCTYPE html>
<html>
<head>
    <title>Dashboard Admin</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f4f7;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .header {
            background-color: #007BFF;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }

        .content {
            background-color: #fff;
            padding: 20px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .content h1 {
            margin-top: 0;
        }

        .content p {
            font-size: 18px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px 0;
            font-size: 16px;
            text-align: center;
            cursor: pointer;
            text-decoration: none;
            color: #fff;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
        }

        .logout {
            background-color: #dc3545;
        }

        .logout:hover {
            background-color: #c82333;
        }

        .dashboard-section {
            margin-top: 30px;
        }

        .dashboard-section h2 {
            border-bottom: 2px solid #007BFF;
            padding-bottom: 10px;
            color: #007BFF;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table, th, td {

                        border: 1px solid #ddd;
        }

        th, td {
            padding: 15px;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: white;
        }

        .chart {
            margin-top: 30px;
        }
    </style>
    <!-- Load Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <?php
    session_start();

    // cek apakah yang mengakses halaman ini sudah login
    if ($_SESSION['level'] == "") {
        header("location:index.php?pesan=gagal");
    }
    ?>
    <div class="header">
        <h1>Dashboard Admin</h1>
    </div>

    <div class="container">
        <div class="content">
            <h1>Selamat Datang, Admin</h1>
            <p>Halo <b><?php echo $_SESSION['username']; ?></b>, Anda telah login sebagai <b><?php echo $_SESSION['level']; ?></b>.</p>

            <a href="jadwal.php" class="btn">Halaman Jadwal</a>
            <a href="data_keuangan.php" class="btn">Data Karyawan</a>
            <a href="logout.php" class="btn logout">LOGOUT</a>
        </div>

        <!-- Section for charts -->
        <div class="dashboard-section">
            <h2>Grafik Statistik</h2>
            <canvas id="myChart" class="chart"></canvas>
        </div>

        <!-- Section for employee data table -->
        <div class="dashboard-section">
            <h2>Data Karyawan</h2>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Departemen</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Contoh data karyawan -->
                        <tr>
                            <td>1</td>
                            <td>Ahmad</td>
                            <td>Manager</td>
                            <td>HRD</td>
                            <td>ahmad@example.com</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Siti</td>
                            <td>Staff</td>
                            <td>Finance</td>
                            <td>siti@example.com</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Budi</td>
                            <td>Supervisor</td>
                            <td>IT</td>
                            <td>budi@example.com</td>
                        </tr>
                        <!-- Tambahkan lebih banyak data karyawan di sini -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        // Data for the chart
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar', // Type of chart: bar, line, pie, etc.
            data: {
                labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'], // Example labels
                datasets: [{
                    label: 'Jumlah Karyawan',
                    data: [10, 20, 30, 40, 50, 60], // Example data
                    backgroundColor: 'rgba(0, 123, 255, 0.5)',
                    borderColor: 'rgba(0, 123, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
