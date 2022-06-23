<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
    .border-table {
        font-family: Arial, Helvetica, sans-serif;
        width: 100%;
        border-collapse: collapse;
        text-align: center;
        font-size: 12px;
    }

    .border-table th {
        border: 1 solid #000;
        font-weight: bold;
        background-color: #e1e1e1;
    }

    .border-table td {
        border: 1 solid #000;
    }
    </style>
</head>

<body>
    <center>
        <h3>Laporan Penjualan</h3>
        <p><?= date('d M Y', strtotime($tanggal['tgl_awal']))  ?> s/d
            <?= date('d M Y', strtotime($tanggal['tgl_akhir']))  ?></p>
    </center>
    <table class="border-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Sale Id</th>
                <th>Tgl Transaksi</th>
                <th>User</th>
                <th>Customer</th>
                <th>Total Transaksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($result as $value) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $value['sale_id'] ?></td>
                <td><?= $value['tgl_transaksi'] ?></td>
                <td><?= $value['firstname'] ?> <?= $value['lastname'] ?></td>
                <td><?= $value['nama_customer'] ?></td>
                <td><?= number_to_currency($value['total'], 'IDR', 'id_ID', 2) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>