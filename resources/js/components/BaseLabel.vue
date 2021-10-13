<template>
  <label
      :for="name"
      class="text-sm text-grey-500"
      :class="{ 'sr-only': !showLabel }"
      v-if="label"
      >
      {{ label }}
    </label>
</template>

<script>
export default {
  name: 'BaseLabel',
  props: {
    name: {
      type: String,
      required: true
    },
    label: {
      type: String,
      default: ""
    },
    showLabel: {
      type: Boolean,
      default: true
    }
  }
}
</script>