<template lang="en">
    <div 
        class="carousel slide" 
        :id="name"
        data-ride="carousel"
        :data-interval="interval"
        >
        <ol class="carousel-indicators">
            <li 
                v-for="(item, index) in items" 
                :key="index"
                :data-target="target = `#${name}`" 
                :data-slide-to="index" 
                :class="index == 0 ? 'active' : ''"
                >
            </li>
        </ol>
        <div class="carousel-inner">
            <div 
                v-for="(item, index) in items" 
                :key="index"
                :class="index == 0 ? 'carousel-item active' : 'carousel-item'"
                >
                <BaseImage
                    class="d-block w-100"
                    :name="alt = `image${index}`"
                    :file="item"
                    height=400
                    />
            </div>
        <!-- navigation control carousel -->
            <a 
                class="carousel-control-prev"
                href="id"
                role="button"
                data-slide="prev"
                >
                <span 
                    class="carousel-control-prev-icon"
                    aria-hidden="true"
                    >
                </span>
                <span class="sr-only">Previous</span>
            </a>
            <a 
                class="carousel-control-next"
                href="id"
                role="button"
                data-slide="next"
                >
                <span 
                    class="carousel-control-next-icon"
                    aria-hidden="true"
                    >
                </span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</template>
<script>
import BaseImage from './BaseImage.vue'

export default {
    name: 'BaseCarousel',
    components: {
        BaseImage
    },
    props: {
        name: {
            type: String,
            default: 'CarouselAnnouncement'
        },
        items: {
            type: Array,
            required: true
        },
        interval: {
            type: Number,
            default: 2000
        }
    },

}
</script>
<style lang="">
    
</style>