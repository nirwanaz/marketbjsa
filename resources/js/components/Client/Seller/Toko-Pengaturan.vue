<template>
  <div class="row py-2 px-3">
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-8">
          <h5 class="h3">Status Toko</h5>
          <p class="text-muted">Aktifkan toko agar pembeli dapat melihat dagangan</p>
        </div>
        <div class="col-md-2">
          <input type="checkbox" name="mstatus" id="mstatus">
        </div>
      </div>
    </div>
    <div class="col-md-12">
      <h5 class="h3">Jam Operasional Toko</h5>
      <div class="form-row">
        <div class="form-group col-md-2">
          <input type="text" name="mopen" id="mopen" class="w-100">
        </div>
        <div class="form-group col-md-1 text-center">
          Sampai
        </div>
        <div class="form-group col-md-2">
          <input type="text" name="mclose" id="mclose" class="w-100">
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  
}
</script>