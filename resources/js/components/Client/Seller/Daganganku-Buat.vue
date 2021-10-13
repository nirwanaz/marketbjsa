<template>
  <div class="row py-2">
    <div class="col-md-6 offset-md-1">
      <Message :errors="errors" />
      <form @submit.prevent="create">
        <h5>Informasi Tipe Dagangan</h5>
        <div class="form-group">
          <BaseLabel name="selectptype" label="Tipe Produk" />
          <select class="form-control" v-model="product.ptype_id" @change="onChangePtype">
            <option value="" disabled selected>Silahkan Pilih Tipe Dagangan</option>
            <option 
              v-for="option in product_types" 
              :key="option.id"
              v-bind:value="option.id"
              >
              {{ option.name }}
              </option>
          </select>
        </div>
        <div class="form-group">
          <BaseLabel name="selectcatg" label="Kategori Produk" />
          <select class="form-control" v-model="product.category_id">
            <option value="" disabled selected>Silahkan Pilih Kategori Dagangan</option>
            <option
              v-for="option in categories"
              :key="option.id"
              :value="option.id"
              >
              {{ option.name }}
              </option>
          </select>
        </div>
        
        <h5>Informasi Produk</h5>
        <div class="form-group">
          <BaseLabel name="productname" label="Nama Produk" />
          <BaseInput 
            name="productname" 
            class="form-control" 
            v-model="product.name" 
            />
        </div>
        <div class="form-group">
          <BaseUpload 
            :fileTypes="['images/*']"
            name="productimage"
            @onFileChange="fileChange($event)"
            />
          <BaseLabel 
            name="productimage" 
            label="*Batas ukuran gambar sebesar 2MB dengan format .JPG, .PNG, .JPEG"
            class="text-muted"
            />
        </div>
        <div class="form-group">
          <BaseLabel 
            name="prodcutdescription" 
            label="Deskripsi Produk"
            />
          <textarea charswidth="20" name="productdescription" class="form-control" v-model="product.description"></textarea>
        </div>

        <h5>Informasi Harga</h5>
        <div class="form-group">
          <BaseLabel 
            name="productprice" 
            label="Harga Produk" 
            />
          <div class="input-group">
            <div class="input-group-prepend">
              <span class="input-group-text">Rp</span>
            </div>
            <input type="text" class="form-control" aria-label="amount" v-model="product.price">
          </div>
        </div>
        <div class="text-center">
          <BaseButton class="btn btn-success" text="Buat Dagangan" />
        </div>
      </form>
    </div>
  </div>
</template>
<style scoped>
  textarea {
    resize: none;
  }
</style>
<script>
import BaseUpload from '../../BaseUpload.vue'
import BaseLabel from '../../BaseLabel.vue'
import BaseInput from '../../BaseInput.vue'
import BaseButton from '../../BaseButton.vue'
import Message from '../../Message.vue'
import FileService from '../../../services/fileService'
import { mapGetters } from 'vuex'

export default {
  components: {
    BaseUpload,
    BaseLabel,
    BaseInput,
    BaseButton,
    Message
  },
  data () {
    return {
      product: {
        ptype_id: "",
        category_id: ""
      },
      categories: [],
      product_types: [],
      merchant_id: null,
      errors: null
    }
  },
  created () {
    this.axios.get(`/api/merchant/owner/${this.account.id}`)
      .then(response => {
        this.merchant_id = response.data.id
      })

    this.axios.get('/api/pt')
      .then(response => {
        this.product_types = response.data
      })
  },
  computed: {
    ...mapGetters({
      account: 'user'
    })
  },
  methods: {
    fileChange (file) {
      this.product.image = file
    },
    onChangePtype () {
      this.axios.get(`/api/catg/findbyptype/${this.product.ptype_id}`)
        .then(response => {
          this.categories = response.data
        })
    },
    create (e) {
      this.errors = []
      if (this.$data.product.category_id && this.$data.product.name
          && this.$data.product.description && this.$data.product.price) {

          const formData = new FormData()
          formData.append('catg_id', this.product.category_id)
          formData.append('name', this.product.name)
          formData.append('image', this.product.image)
          formData.append('description', this.product.description)
          formData.append('price', this.product.price)
          formData.append('m_id', this.merchant_id)

          const payload = {}
          payload.endpoint = '/api/prod'
          payload.file = formData

          FileService.uploadImage(payload)
            .then(response => {
              this.$swal.fire({
                title: response.data.success ? 'Success' : 'Failed',
                text: response.data.message,
                icon: response.data.success ? 'success' : 'danger',
                timer: 1000
              })
            })
        }

      if (!this.product.category_id) {
        this.errors.push('Kategori Produk Harus Diisi')
      }

      if (!this.product.name) {
        this.errors.push('Nama Produk Harus Diisi')
      }

      if (!this.product.description) {
        this.errors.push('Deskripsi Produk Harus Diisi')
      }

      if (!this.product.price) {
        this.errors.push('Harga Produk Harus Diisi')
      }

      e.preventDefault()
    }
  }
}
</script>