<template>
    <form class="form-inline m-auto">
        <div class="input-group">
            <base-input 
                name="search" 
                placeholder="pencarian..."
                size="50"
                aria-label="pencarian"
                aria-describedby="basic-search"
                />
            <div class="input-group-append">
                <base-button
                    class="input-group-text"
                    text="Cari"
                    />
            </div>
        </div>
    </form>
</template>
<script>
import BaseButton from './BaseButton.vue'
import BaseInput from './BaseInput.vue'
export default {
    name: 'BaseSearch',
    components: {
        BaseInput,
        BaseButton
    }
}
</script>