<template>
  <div class="container-fluid">
    <div class="col-sm-12 py-2">
      <div class="row">
        <div v-for="merchant in (20)" :key="merchant" class="col-sm-6 col-md-3 p-3">
          <div class="card shadow-sm">
            <img 
              class="card-img-top"
              src="https://cdn.pixabay.com/photo/2018/07/01/19/50/muffin-3510308__340.jpg"
              alt="Merchant"
              >
            <div class="card-body">
              <h5 class="card-title">Merchant {{ merchant }}</h5>
              <p class="card-text">Information of merchant</p>
            </div>
            <div class="list-group list-group-flush">
              <a 
                v-for="food in (3)" 
                :key="food" 
                class="list-group-item list-group-item-action" 
                href="#"
                >
                Food1
              </a>
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