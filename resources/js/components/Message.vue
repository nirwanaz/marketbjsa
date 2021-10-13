<template>
  <div class="alert alert-danger" v-if="errors.length">
    <b>{{ text }}</b>
    <ul>
      <li v-for="message in errors" :key="message">
        {{ message }}
      </li>
    </ul>
  </div>
</template>
<script>
export default {
  name: 'Message',
  props: {
    errors: {
      type: Array,
      default: null
    },
    text: {
      type: String,
      default: 'Terdapat Kesalahan'
    }
  }
}
</script>