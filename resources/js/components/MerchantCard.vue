<template>
    <div class="card">
        <BaseImage 
            class="card-img-top p-2"
            :file="fileImage"
            :name="nameImage"
            height="200"
            width="200"
            />
        <div class="card-body">
            <h5 class="card-title">{{ title }}</h5>
            <p class="card-text">
                Owner: 
                <small class="text-muted">
                    {{ owner }} 
                </small>
            </p>
        </div>
        <div class="card-footer">
            <small>
                Terdaftar: 
                <span class="text-muted">
                    {{ created }}
                </span>
            </small>
        </div>
    </div>
</template>
<script>
import BaseImage from './BaseImage.vue'

export default {
    name: 'MerchantCard',
    components: {
        BaseImage
    },
    props: {
        fileImage: {
            type: String,
            required: true
        },
        nameImage: {
            type: String,
            required: true
        },
        title: {
            type: String,
            required: true
        },
        owner: {
            type: String,
            required: true
        },
        created: {
            type: String,
            required: true
        }
    }    
}
</script>