<template>
  <div class="container-fluid">
    <div class="row justify-content-center" style="height: 600px">
      <div class="col-md-4 align-self-center">
        <img 
          class="image"
          src="https://cdn.pixabay.com/photo/2014/04/02/11/11/welcome-305504_960_720.png"
          alt="img1"
          height="400"
          >
      </div>
      <div class="col-md-4 align-self-center">
        <div class="card">
          <div class="card-header">
            <h5>Seller Marketplace</h5>
          </div>
          <div class="card-body">
            <router-view></router-view>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<style>
  .image{
    width: inherit
  }
</style>