<template>
  <div class="row py-2">
    <div class="col-md-10 offset-1 px-3">
      <div class="form-row mb-3">
        <div class="col-md-6">
          <button class="btn btn-primary">Tambah Produk</button>
        </div>
        <div class="col-md">
          <div class="input-group">
            <input 
              type="text" 
              class="form-control" 
              placeholder="Cari Produk"
              aria-label="Product's name"
              aria-describedby="find"
              >
            <div class="input-group-append">
              <a class="btn btn-primary input-group-text" id="find">Cari</a>
            </div>
          </div>
        </div>
      </div>

      <div v-for="product in (5)" :key="product" class="card mb-3">
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">Nama produk</th>
                <th scope="col">Harga</th>
                <th scope="col">Diperbarui</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">Makanan {{ product }}</th>
                <td>Rp. 15000</td>
                <td>-</td>
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

      <nav aria-label="Page Navigation">
        <ul class="pagination pagination-lg justify-content-center">
          <li class="page-item">
            <a class="page-link" href="#" tabindex="-1">Prev</a>
          </li>
          <li v-for="page in (3)" :key="page" class="page-item">
            <a class="page-link" href="#">{{ page }}</a>
          </li>
          <li class="page-item">
            <a class="page-link" href="#">Next</a>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</template>
