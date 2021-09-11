<template>
  <div class="row justify-content-center py-2">
    <div class="col-md-4">
      <div class="form-group">
        <div class="inputfile bg-image border rounded">
          <input type="file" name="mprofil" id="mprofil" class="upload">
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <h5 class="text-center">Informasi Toko</h5>
      <div class="form-group">
        <label for="merchantName">Nama Toko</label>
        <input type="text" name="mname" id="mname" class="form-control">
      </div>
      <div class="form-group">
        <label for="merchantAddress">Alamat Toko</label>
        <input type="text" name="maddress" id="maddress" class="form-control">
      </div>
    </div>
  </div>
</template>

<style scoped>
  .bg-image {
    background-image: url('https://cdn.pixabay.com/photo/2021/07/25/08/03/account-6491185__340.png');
    background-position: center;
    background-size: cover;
    width: 200px;
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

</style>

<script>
export default {
  
}
</script>