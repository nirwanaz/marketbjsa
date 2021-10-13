<template>
    <input
      :id="name"
      :type="type"
      :value="value"
      :required="required"
      @input="updateValue"
      :placeholder="placeholder"
      :autocomplete="autocomplete"
      class="form-control"
      >
</template>

<script>
export default {
  name: 'BaseInput',
  inheritAttrs: false,
  props: {
    name: {
      type: String,
      required: true
    },
    value: {
      type: [String, Number]
    },
    type: {
      type: String,
      default: 'text'
    },
    required: {
      type: Boolean,
      default: false
    },
    placeholder: {
      type: String,
      default: null
    },
    autocomplete: {
      type: String,
      default: null
    }
  },
  methods: {
    updateValue (e) {
      return this.$emit("input", e.target.value)
    }
  }
}
</script>