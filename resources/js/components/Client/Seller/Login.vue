<template>
  <div class="form">
    <Message :errors="errors" />
    <form @submit.prevent="authenticate">
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
          label="Password"
          name="password"
          />
        <BaseInput 
          name="password"
          type="password"
          :required="true"
          v-model="account.passwd"
          class="form-control"
          />
      </div>
      <div class="form-group">
        <router-link :to="{ name:'sregister' }" class="btn btn-primary">Daftar</router-link>
        <BaseButton class="btn btn-success" text="Masuk" />
      </div>
    </form>
  </div>
</template>
<script>
import Message from '../../Message.vue'
import BaseButton from '../../BaseButton.vue'
import BaseInput from '../../BaseInput.vue'
import BaseLabel from '../../BaseLabel.vue'

export default {
  components: {
    Message,
    BaseButton,
    BaseInput,
    BaseLabel
  },
  data() {
    return {
      account: {
        username: null,
        passwd: null
      },
      errors: []
    }
  },
  methods: {
    authenticate () {
      this.errors = []

      if (this.$data.account.username && this.$data.account.passwd) {
        this.$store.dispatch('login', this.account).then(() => {
          this.$swal.fire({
            title:'success',
            text:'Tunggu Sebentar',
            icon:'success',
            timer:5000
          })

          let redirect = this.$route.query.redirect

          if (!redirect) redirect = {name: 'mperformance'}
          this.$router.push(redirect) 
        }).catch(error => {
          console.log(error)
        })
      }

      if (!this.account.username) {
        this.errors.push('Username Wajib Diisi !')
      }

      if (!this.account.passwd) {
        this.errors.push('Password Wajib Diisi !')
      }
    }
  }
}
</script>