<!-- Modal Add Cart -->
<div class="modal fade" tabindex="-1" id="modal-book">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="datatablesSimple" class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kover</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($data_buku as $value) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td>
                                    <img src="/img/<?= $value['cover'] ?>" alt="" width="100px">
                                </td>
                                <td><?= $value['title'] ?></td>
                                <td><?= $value['name_category'] ?></td>
                                <td><?= number_to_currency($value['price'], 'IDR', 'id_ID', 2) ?></td>
                                <td><?= $value['stock'] ?></td>
                                <td>
                                    <button class="btn btn-primary" onclick="add_to_cart('<?= $value['book_id'] ?>','<?= $value['title'] ?>','<?= $value['price'] ?>','<?= $value['discount'] ?>')"><i class="fas fa-plus-circle"></i> Pilih</button>
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

<!-- Modal Ubah Stok -->
<div class="modal fade" tabindex="-1" id="modal-update-book">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ubah Jumlah Buku</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="rowid">
                <input type="number" class="form-control" id="qty">
            </div>
            <div class="modal-footer">
                <button onclick="update_to_cart()" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>

<script>
    function add_to_cart(id, judul, harga, diskon) {
        $.ajax({
            url: "/add-cart-jual",
            method: "post",
            data: {
                'id_buku': id,
                'judul_buku': judul,
                'harga_buku': harga,
                'diskon': diskon,
            },
            success: function(data) {
                load()
            }
        });
    }

    function update_to_cart() {
        var rowid = $('#rowid').val()
        var qty = $('#qty').val()

        $.ajax({
            url: "/edit-cart-jual/" + rowid,
            method: "post",
            data: {
                'jumlah': qty,
            },
            success: function(data) {
                load()
                $('#modal-update-book').modal('hide');
            }
        });
    }
</script>