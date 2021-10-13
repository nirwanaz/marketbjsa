<template>
  <button
    :type="type"
    v-on="$listeners"
    >
    {{ text }}
  </button>
</template>

<script>
export default {
  name: 'BaseButton',
  props: {
    type: {
      type: String,
      default: 'submit'
    },
    text: {
      type: String,
      default: 'Submit'
    }
  }
}
</script>