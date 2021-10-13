<template>
  <form @submit.prevent="updateSetting">
      <div class="form-group row px-3">
        <BaseLabel 
          name="merchantstatus" 
          label="Aktifkan toko agar pembeli dapat melihat dagangan" 
          class="col-sm-8 col-form-label"
          />
        <div class="col-sm-4">
          <input 
            name="merchantstatus" 
            type="checkbox"
            class="form-control"
            v-model="merchant.isstatus"
            />
        </div>
      </div>
      <div class="form-group row px-3">
        <BaseLabel 
          name="merchantoperation"
          label="Jam operasional toko"
          class="h5 col-sm-12"
          />
        <div class="col-sm-2">
          <BaseInput 
            name="merchantopened"
            type="time"
            class="form-control"
            v-model="merchant.opened"
            /> 
        </div>
        <BaseLabel 
          name="until"
          label="Sampai"
          class="col-sm-1 col-form-label"
          />
        <div class="col-sm-2">
          <BaseInput 
            name="merchantopened"
            type="time"
            class="form-control"
            v-model="merchant.closed"
            /> 
        </div>
      </div>
      <div class="form-group row justify-content-center">
        <BaseButton class="btn btn-success" text="Simpan" />
      </div>
  </form>
</template>

<script>
import BaseLabel from '../../BaseLabel.vue'
import BaseInput from '../../BaseInput.vue'
import BaseButton from '../../BaseButton.vue'
import { mapGetters } from 'vuex'

export default {
  components: {
    BaseLabel,
    BaseInput,
    BaseButton
  },
  data () {
    return {
      merchant: {
        id: null,
        _method: 'PUT',
        isstatus: null,
        opened: '09:00',
        closed: '17:00'
      }
    }
  },
  computed: {
    ...mapGetters({
      account: 'user'
    })
  },
  created () {
    this.axios.get(`/api/merchant/owner/${this.account.id}`).then((response) => {
      this.merchant.id = response.data.id
      this.merchant.isstatus = (response.data.status == '1') ? true : false

      if (response.data.opened) this.merchant.opened = response.data.opened

      if (response.data.closed) this.merchant.closed = response.data.closed
    })
  },
  methods: {
    updateSetting (e) {
      this.axios.post(`/api/merchant/setting/${this.merchant.id}`, this.merchant)
        .then(response => {
          this.$swal.fire({
            title: response.data.success ? 'Success' : 'Failed',
            text: response.data.message,
            icon: response.data.success ? 'success' : 'danger',
            time: 1000
          })
        })

        e.preventDefault()
    }
  }  
}
</script>