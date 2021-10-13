<template>
  <div class="inputfile bg-img" :style="{'background-image': `url(${imgSrc})`}">
    <input
      type="file"
      :accept="fileTypes"
      @change="onFileChange"
      :id="name"
      class="upload"
      >
  </div>
</template>
<style scoped>
  .bg-img {
    background-size: 150px 150px;
    background-position: center;
    background-repeat: no-repeat;
  }
  .inputfile {
    height: 150px;
    width: 150px;
    overflow: hidden;
  }
  .inputfile input.upload {
    cursor: pointer;
    height: 100%;
    opacity: 0;
  }
</style>
<script>
export default {
  name: 'BaseUpload',
  props: {
    fileTypes: {
      type: Array,
      default: null
    },
    name: {
      type: String,
      required: true
    }
  },
  data () {
    return {
      imgSrc: 'https://cdn-icons-png.flaticon.com/128/401/401061.png'
    }
  },
  methods: {
    onFileChange (e) {
      const file = e.target.files[0] || e.dataTransfer.files[0]
      const reader = new FileReader()
      
      reader.onload = e => {
        this.imgSrc = e.target.result
      }

      reader.readAsDataURL(file)

      this.$emit('onFileChange', file)
    }
  }
}
</script>