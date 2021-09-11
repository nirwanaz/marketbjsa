<template>
  <div class="container-fluid">
    <div class="col-sm-12 py-2">
      <div class="card shadow-sm">
        <div class="card-body">
          <div class="row m-3">
            <div class="col-sm col-md-3 p-3">
              <div class="card-img-top">
                <img 
                  class="img-thumbnail rounded" 
                  src="https://cdn.pixabay.com/photo/2016/08/16/06/29/coconut-1597233__340.png" 
                  alt="Card image cap"
                  >
              </div>
            </div>
            <div class="col-sm col-md-3 p-3">
              <h3 class="card-title">Merchant</h3>
              <p class="card-text">This is a wider card with supporting text</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-12 py-2">
      <div class="card">
        <div class="card-header">Recommend</div>
        <div class="card-body">
          <div class="row">
            <div v-for="food in (5)" :key="food" class="col-sm-6 col-md-4 col-lg-3 col-xl-3 my-2">
              <div class="card">
                <img 
                  class="card-img-top" 
                  src="https://cdn.pixabay.com/photo/2018/07/01/19/50/muffin-3510308__340.jpg" 
                  alt="Food Img"
                  >
                <div class="card-body">
                  <h5 class="card-title">Food {{ food }}</h5>
                  <p class="card-text">Rp. 15000</p>
                </div>
                <div class="card-footer">
                  <p class="card-text text-right">Diliat 100</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-12 py-2">
      <div class="card">
        <div class="card-header">
          <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
              <a class="nav-link" href="#">Beverages</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-4 col-md-4 col-lg-3 col-lg-3">
              <div class="card">
                <img 
                  class="card-img-top" 
                  src="https://cdn.pixabay.com/photo/2018/07/01/19/50/muffin-3510308__340.jpg"
                  alt="Food Img"
                  >
                <div class="card-body">
                  <h5 class="card-title">Food {{ food }}</h5>
                  <p class="card-text">Rp. 10.000</p>
                </div>
                <div class="card-footer">
                  <p class="card-text text-right">Diliat 100</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> 
  </div>
</template>

<script>
export default {
  
}
</script>