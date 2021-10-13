<template>
  <div>
    <Header />
    <div class="container-fluid">
      <div class="row py-2">
        <div class="col-sm-6 col-md-3">
          <SideBar />
        </div>
        <div class="col-sm-6 col-md-9">
          <div class="border rounded shadow-sm">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item" href="#">Tokoku</li>
                <li class="breadcrumb-item" aria-current="page">{{ this.currentPage }}</li>
              </ol>
            </nav>
            <router-view />
          </div>
        </div>
      </div>
    </div>
    <Footer />
  </div>
</template>

<script>
import Header from './Header.vue'
import Footer from './Footer.vue'
import SideBar from './Sidebar.vue'
export default {
  components: {
    Header,
    Footer,
    SideBar
  },
  data () {
    return {
      currentPage: 'Performa'
    }
  },
  created () {
    this.currentPage = this.$route.name
  },
  watch: {
    $route (to, from) {
      this.currentPage = to.name
    }
  }
}
</script>