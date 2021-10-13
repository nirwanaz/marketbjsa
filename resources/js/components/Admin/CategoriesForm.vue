<template>
  <div class="container-fluid">
    <div class="col-md-12">
      <form>
        <div class="form-group">
          <label for="categoriesName">Nama Kategori</label>
          <input type="text" class="form-control" id="categoriesName">
        </div>
        <div class="form-group">
          <label for="productType">Tipe Produk</label>
          <select class="form-control" id="productType">
            <option selected>Silahkan Pilih Tipe Produk</option>
          </select>
        </div>
        <div class="form-group">
          <label for="categoriesDescription">Deskripsi Kategori</label>
          <input type="text" class="form-control" id="categoriesDescription">
        </div>
        <a class="btn btn-primary" href="#">Kembali</a>
        <button type="button" class="btn btn-success">Simpan</button>
      </form>
    </div>
  </div>
</template>