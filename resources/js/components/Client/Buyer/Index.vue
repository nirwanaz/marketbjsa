<template>
  <div>
    <buyer-navbar :route="{ name: 'main' }"/>
    <div class="container-fluid">
      <router-view/>
    </div>
  </div>
</template>

<script>
import BuyerNavbar from '../../BuyerNavbar.vue'

export default {
  components: {
    BuyerNavbar,
  }
}
</script>