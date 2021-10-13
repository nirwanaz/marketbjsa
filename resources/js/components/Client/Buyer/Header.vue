<template>
  <nav class="navbar navbar-expand-lg navbar-light bg-light box-shadow">
    <a class="navbar-brand" href="#">Marketplace</a>
    <button 
      class="navbar-toggler" 
      type="button" 
      data-toggle="collapse" 
      data-target="#navbarNavAltMarkup"
      aria-controls="navbarNavAltMarkup"
      aria-expanded="false"
      aria-label="Toggle Navigation"
      >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <form class="form-inline w-100 justify-content-center">
        <div class="input-group">
          <input 
            type="text" 
            class="form-control" 
            placeholder="Pencarian..."
            size="50" 
            aria-label="pencarian" 
            aria-describedby="basic-search"
            >
          <div class="input-group-append">
            <button class="input-group-text" id="basic-search">Cari</button>
          </div>
        </div>
      </form>
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home 
            <span class="sr-only">(current)</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Features</a>
        </li>
      </ul>
    </div>
  </nav>
        
</template>
<style scoped>
  .box-shadow {
    box-shadow: 0 2px 0 0 rgba(0, 0, 0, 0.07), 0 3px 0 0 rgba(0, 0, 0, 0.05);
  }
</style>
<script>
export default {
  
}
</script>