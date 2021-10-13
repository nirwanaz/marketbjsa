<template>
    <form @submit.prevent="save">
      <div class="row justify-content-center py-2">
        <div class="col-md-4">
          <h5 class="text-center">Gambar Toko</h5>
          <div class="form-group">
            <div class="inputfile bg-image" :style="{ 'background-image': `url(${imgSrc})` }">
              <input 
                type="file" 
                name="mprofile"
                :accept="['image/*']" 
                class="upload" 
                @change="onChangeImg"
                />
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <h5 class="text-center">Informasi Toko</h5>
          <div class="form-group">
            <BaseLabel 
              name="merchantname"
              label="Nama Toko"
              />
            <BaseInput 
              name="merchantname"
              :required="true"
              v-model="merchant.name"
              class="form-control"
              v-if="!isDisabled"
              />
            <p v-else> {{ merchant.name }}</p>
          </div>
          <div class="form-group">
            <BaseLabel 
              name="merchantaddress"
              label="Alamat Toko"
              />
            <BaseInput 
              name="merchantaddress"
              :required="true"
              v-model="merchant.address"
              class="form-control"
              />
          </div>
          <div class="form-group">
            <BaseButton class="btn btn-success" text="Simpan" />
          </div>
        </div>
      </div>
    </form>
</template>

<style scoped>
  .bg-image {
    background-position: center;
    background-size: cover;
    width: 200px;
  }

  .inputfile {
    height: 200px;
    margin: auto;
    overflow: hidden;
  }
  
  .inputfile input.upload {
    cursor: pointer;
    height: 100%;
    opacity: 0;
  }

</style>

<script>
import { mapGetters } from 'vuex'
import BaseLabel from '../../BaseLabel.vue'
import BaseInput from '../../BaseInput.vue'
import BaseButton from '../../BaseButton.vue'
import FileService from '../../../services/fileService'

export default {
  components: {
    BaseLabel,
    BaseInput,
    BaseButton
  },
  data () {
    return {
      merchant: {
        name: null,
        address: null,
        picture: null
      },
      isDisabled: false,
      imgSrc: 'https://cdn.pixabay.com/photo/2021/07/25/08/03/account-6491185__340.png'
    }
  },
  computed: {
    ...mapGetters({
      account: 'user'
    })
  },
  created () {
    this.axios.get(`/api/merchant/owner/${this.account.id}`).then((response) => {
      this.merchant = response.data

      if (this.merchant.ischangename == 1) this.isDisabled = true

      if (this.merchant.picture) this.imgSrc = `/storage/merchant_img/${this.merchant.picture}`
    })
  },
  mounted () {
    
  },
  methods: {
    save (e) {
      const payload = {}
      const formdata = new FormData()

      formdata.append('name', this.merchant.name)
      formdata.append('address', this.merchant.address)
      formdata.append('picture', this.merchant.picture)
      formdata.append('_method', 'PUT')

      payload.endpoint = `/api/merchant/profile/${this.merchant.id}`
      payload.file = formdata

      FileService.uploadImage(payload)
        .then((response) => {
          this.$swal.fire({
            title: 'success',
            text: response.message,
            icon: 'success',
            timer: 1000
          })
        })
        .catch((err) => {
          console.log(err)
        })

      e.preventDefault()
    },
    onChangeImg (e) {
      const file = e.target.files || e.dataTransfer.files
      if (!file.length) return 

      this.merchant.picture = file[0]
      console.log(this.merchant.picture)
      this.onLoadImg(this.merchant.picture)
    },
    onLoadImg (file) {
      if (!file) return

      const reader = new FileReader() 

      reader.onload = e => {
        this.imgSrc = e.target.result
      }

      reader.readAsDataURL(file)
    }
  }
}
</script>