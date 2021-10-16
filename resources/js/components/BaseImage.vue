<template>
    <img
        :alt="name"
        :src="file"
        />
</template>
<script>
export default {
    name: 'BaseImage',
    props: {
        name: {
            type: String,
            required: true
        },
        file: {
            type: String,
            required: true
        }
    }
}
</script>