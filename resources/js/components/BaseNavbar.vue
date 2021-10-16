<template>
    <nav class="navbar navbar-dark bg-dark box-shadow">
        <router-link
            class="navbar-brand"
            :to="route"
            >
            {{ brandName }}
        </router-link>
    </nav>

</template>
<script>
export default {
    name: 'BaseNavbar',
    props: {
        route: {
            type: Object,
            required: true
        },
        brandName: {
            type: String,
            default: 'Marketplace'
        }
    }
}
</script>