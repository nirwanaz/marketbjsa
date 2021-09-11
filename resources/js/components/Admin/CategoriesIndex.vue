<template>
  <div class="container-fluid">
    <div class="col-md-12">
      <h5>Tabel Kategori</h5>
      <a class="btn btn-primary" href="#">Tambah Kategori</a>
      <table class="table">
        <thead>
          <tr>
            <th>NO.</th>
            <th>Nama Kategori</th>
            <th>Tipe Produk</th>
            <th>Deskripsi produk</th>
            <th>Pembaruan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Beverages</td>
            <td>Makanan</td>
            <td>lorem ipsum</td>
            <td>2021-08-10 21:00</td>
            <td>
              <div class="btn-group dropdown">
                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Action
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#">Edit</a>
                  <a class="dropdown-item" href="#">Hapus</a>
                </div>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>