<template>
  <div class="row py-2">
    <div class="col-md-6 offset-md-1">
      
      <h5>Informasi Tipe Dagangan</h5>
      <div class="form-group">
        <label for="selectType">Tipe Dagangan</label>
        <select class="form-control">
          <option selected>Silahkan Pilih Tipe Dagangan</option>
          <option value="1">Makanan</option>
        </select>
      </div>
      <div class="form-group">
        <label for="selectCategory">Kategori Dagangan</label>
        <select class="form-control">
          <option selected>Silahkan Pilih Kategori Dagangan</option>
          <option value="1">Makanan Berat</option>
        </select>
      </div>
      
      <h5>Informasi Produk</h5>
      <div class="form-row">
        <div class="form-group col-md-4">
          <div class="inputfile bg-img border rounded w-100">
            <input type="file" name="mdagang" id="mdagang" class="upload">
          </div>
          <p class="text-muted">Gambar 1</p>
        </div>
        <div class="form-group col-md-4">
          <div class="inputfile bg-img border rounded w-100">
            <input type="file" name="mdagang" id="mdagang" class="upload">
          </div>
          <p class="text-muted">Gambar 2</p>
        </div>
        <div class="form-group col-md-4">
          <div class="inputfile bg-img border rounded w-100">
            <input type="file" name="mdagang" id="mdagang" class="upload">
          </div>
          <p class="text-muted">Gambar 3</p>
        </div>
        <p class="text-muted">*Batas ukuran gambar sebesar 2MB dengan format .JPG, .PNG, .GIF</p>
      </div>
      <div class="form-group">
        <label for="desc">Deskripsi Produk</label>
        <textarea charswidth="20" name="desc" class="form-control"></textarea>
      </div>

      <h5>Informasi Harga</h5>
      <div class="form-group">
        <label for="price">Harga Produk</label>
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">Rp</span>
          </div>
          <input type="text" class="form-control" aria-label="amount">
        </div>
      </div>
      <div class="text-center">
        <button class="btn btn-success">Buat Dagangan</button>
      </div>
    </div>
  </div>
</template>
<style scoped>
  .bg-img {
    background-image: url('https://cdn.pixabay.com/photo/2021/07/21/12/49/youtube-6482986_960_720.png');
    background-size: cover;
  }
  .inputfile {
    height: 200px;
    overflow: hidden;
  }
  .inputfile input.upload {
    cursor: pointer;
    height: 100%;
    opacity: 0;
  }
  textarea {
    resize: none;
  }
</style>