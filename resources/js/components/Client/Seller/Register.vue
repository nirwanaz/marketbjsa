<template>
  <div>
    <Message :errors="errors" />
    <form @submit.prevent="register">
      <div class="form-group">
        <BaseLabel 
          label="Nama Lengkap"
          name="fullname"
          />
        <BaseInput 
          name="fullname"
          :required="true"
          v-model="account.fullname"
          class="form-control"
          />
      </div>
      <div class="form-group">
        <BaseLabel 
          label="Alamat"
          name="address"
          />
        <BaseInput 
          name="address"
          :required="true"
          v-model="account.address"
          class="form-control"
          />
      </div>
      <div class="form-group">
        <BaseLabel 
          label="Username"
          name="username"
          />
        <BaseInput 
          name="username"
          :required="true"
          v-model="account.username"
          class="form-control"
          />
      </div>
      <div class="form-group">
        <BaseLabel 
          label="Katasandi"
          name="passwd"
          />
        <BaseInput 
          name="passwd"
          type="password"
          :required="true"
          v-model="account.passwd"
          class="form-control"
          />
      </div>
      <div class="form-group">
        <BaseLabel 
          label="Ulangi Katasandi"
          name="repasswd"
          />
        <BaseInput 
          name="repasswd"
          type="password"
          :required="true"
          v-model="account.repasswd"
          class="form-control"
          />
      </div>
      <div class="form-group">
        <button class="btn btn-secondary">Daftar</button>
      </div>
    </form>
  </div>
</template>
<script>
import Message from '../../Message.vue'
import BaseInput from '../../BaseInput.vue'
import BaseLabel from '../../BaseLabel.vue'
import BaseButton from '../../BaseButton.vue'

export default {
  components: {
    Message,
    BaseLabel,
    BaseInput,
    BaseButton
  },
  data() {
    return {
      account: {},
      errors: [], 
    }
  },
  methods: {
    register (e) {
      this.errors = []

      if (this.$data.account.fullname 
            && this.$data.account.address
            && this.$data.account.username
            && this.$data.account.passwd
            && this.$data.account.repasswd) {
        if (this.$data.account.passwd === this.$data.account.repasswd) {
          this.$store.dispatch('register', this.account)
            .then((response) => {
              console.log(response);
              this.$router.push({ name: 'slogin' })
            })
            .catch(error => {
              this.errors = error.response.data.errors
            })
        } else {
          this.errors.push('Katasandi tidak cocok')
        }
      } else {
        console.log('err!')
      }
      
      if (!this.account.fullname) {
        this.errors.push('Nama Lengkap Harus Diisi')
      }

      if (!this.account.address) {
        this.errors.push('Alamat Harus Diisi')
      }

      if (!this.account.username) {
        this.errors.push('Username Harus Diisi')
      }

      if (!this.account.passwd) {
        this.errors.push('Katasandi Harus Diisi')
      }

      if (!this.account.repasswd) {
        this.errors.push('Ulangi Katasandi Harus Diisi')
      }

      e.preventDefault()
    }
  }
}
</script>