<template>
  <div class="container-fluid">
    <div class="col-sm-12 py-2">
      <div class="carousel slide" id="carouselAnnounce" data-ride="carousel" data-interval="3000">
        <ol class="carousel-indicators">
          <li data-target="#carouselAnnounce" data-slide-to="0" class="active"></li>
          <li data-target="#carouselAnnounce" data-slide-to="1"></li>
          <li data-target="#carouselAnnounce" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" height="400" src="https://cdn.pixabay.com/photo/2018/07/18/19/12/pasta-3547078_960_720.jpg" alt="First Slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" height="400" src="https://cdn.pixabay.com/photo/2018/08/29/19/03/steak-3640560_960_720.jpg" alt="Second Slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" height="400" src="https://cdn.pixabay.com/photo/2016/01/22/02/13/meat-1155132_960_720.jpg" alt="Third Slide">
          </div>
          <a 
            class="carousel-control-prev" 
            href="#carouselAnnounce" 
            role="button" 
            data-slide="prev"
            >
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a
            class="carousel-control-next" 
            href="#carouselAnnounce"
            role="button"
            data-slide="next"
            >
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>

    </div>
    <div class="col-sm-12 py-3">
      <div class="card">
        <div class="card-body">
          <ul class="nav justify-content-center">
            <li v-for="category in (5)" :key="category" class="nav-item">
              <a class="nav-link" href="#">Category {{ category }}</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Begin Card -->
    <div class="col-sm-12 py-3">
      <div class="row">
        <div v-for="id in (5)" :key="id" class="col-sm-6 col-md-4 col-lg-3 col-xl-3 my-2">
          <div class="card">
            <img class="card-img-top" src="https://cdn.pixabay.com/photo/2016/08/16/06/29/coconut-1597233__340.png" alt="Card image cap">
            <div class="card-body">
              <h5 class="card-title">Merchant {{ id }}</h5>
              <p class="card-text">This is a wider card with supporting text</p>
            </div>
            <div class="card-footer">
              <small class="text-muted">Last updated 3 mins ago</small>
            </div>
          </div>
        </div>
      </div>      
    </div>
    <!-- End Card -->
  </div>

</template>
<!--
<style scoped>
    @media (max-width: 575.98px) {
      .card-columns {
        column-count: 3;
      }
    };
    
    @media (min-width: 576px) and (max-width: 767.98px) {
      .card-columns {
        column-count: 4;
      }
    }

    @media (min-width: 768px) and (max-width: 991.98px) {
      .card-columns {
        column-count: 5;
      }
    }

    @media (min-width: 992px) and (max-width: 1199.98px) {
      .card-columns {
        column-count: 6;
      }
    }

</style>>
-->
<script>
export default {
  
}
</script>