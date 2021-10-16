<template>
    <nav class="navbar navbar-dark bg-dark box-shadow">
        <router-link
            class="navbar-brand"
            :to="route"
            >
            {{ brandName }}
        </router-link>
        <base-search />
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <router-link class="nav-link" :to="{ name: 'main' }">
                    Home
                    <span class="sr-only">(current)</span>
                </router-link>
            </li>
        </ul>
    </nav>
</template>

<script>
import BaseSearch from './BaseSearch.vue'
export default {
    name: 'BuyerNavbar',
    components: {
        BaseSearch
    },
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