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
    <h3 style="text-align: center;">NOTA TRANSAKSI</h3>
    <p>
        Nomor Transaksi: <?= $data_transaksi['sale_id'] ?> <br>
        Tanggal Transaksi: <?= $data_transaksi['created_at'] ?><br>
        Kasir: <?= $data_transaksi['firstname'] ?> <?= $data_transaksi['lastname'] ?><br>
        Customer: <?= $data_transaksi['name'] ?><br>
    </p>

    <table class="border-table">
        <thead>
            <tr>
                <th>No</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            $total = 0;
            $jml = 0;
            foreach ($detail as $value) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $value['title'] ?></td>
                <td><?= $value['amount'] ?></td>
                <td><?= number_to_currency($value['price'], 'IDR', 'id_ID', 2) ?></td>
                <td><?= number_to_currency($value['total_price'], 'IDR', 'id_ID', 2) ?></td>
            </tr>
            <?php $total += $value['total_price'];
                $jml += $value['amount'];
            endforeach; ?>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="4">Total Pembayaran</td>
                <td>
                    <?= number_to_currency($total, 'IDR', 'id_ID', 2) ?>
                </td>
            </tr>
            <tr>
                <td colspan="4">Jumlah Item</td>
                <td><?= $jml ?></td>
            </tr>
        </tfoot>
    </table>
</body>

</html>