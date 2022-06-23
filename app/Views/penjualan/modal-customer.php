<div class="modal fade" tabindex="-1" id="modal-customer">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="datatablesSimple2" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Customer</th>
                            <th>No Customer</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data_customer as $value) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['name'] ?></td>
                                <td><?= $value['no_customer'] ?></td>
                                <td>
                                    <button class="btn btn-primary" onclick="getCustomer('<?= $value['customer_id'] ?>','<?= $value['name'] ?>')"><i class="fas fa-plus-circle"></i> Pilih</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    function getCustomer(id, nama) {
        $('#id-customer').val(id)
        $('#nama-customer').val(nama)
        $('#modal-customer').modal('hide');
    }
</script>