<template>
  <div class="container-fluid">
    <div class="col-sm-12 py-2">
      <BaseCarousel 
        :interval="3000"
        :items="items"
        />
    </div>
    <div class="col-sm-12 py-3">
      <div class="card">
        <div class="card-body">
          <ul class="nav justify-content-center">
            <li v-for="category in categories" :key="category.id" class="nav-item">
              <a class="nav-link" href="#">{{ category.name }}</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Begin Card -->
    <div class="col-sm-12 py-3">
      <div class="row">
        <div v-for="merchant in merchants" :key="merchant.id" class="col-sm-6 col-md-4 col-lg-3 col-xl-3 my-2">
          <MerchantCard 
            :fileImage="merchant.image ? `/storage/merchant_img/${merchant.image}` : 'https://cdn.pixabay.com/photo/2016/08/16/06/29/coconut-1597233__340.png'"
            nameImage="Merchant Card"
            :title="merchant.name"
            :owner="merchant.owner"
            :created="merchant.created_at"
            />
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
import BaseCarousel from '../../BaseCarousel.vue'
import MerchantCard from '../../MerchantCard.vue'
export default {
  components: {
    BaseCarousel,
    MerchantCard
  },
  data () {
    return {
      items: [
          'https://cdn.pixabay.com/photo/2018/07/18/19/12/pasta-3547078_960_720.jpg',
          'https://cdn.pixabay.com/photo/2018/08/29/19/03/steak-3640560_960_720.jpg',
          'https://cdn.pixabay.com/photo/2016/01/22/02/13/meat-1155132_960_720.jpg'
      ],
      categories: [],
      merchants: [],
    }
  },
  created () {
    this.axios.get('/api/catg')
      .then(response => {
        this.categories = response.data
      })
    this.axios.get('/api/merchant')
      .then(response => {
        this.merchants = response.data
      })
  }
  
}
</script>