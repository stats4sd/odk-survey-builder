<template>
    <div class="container">
        <survey-progress-bar
            :current-step="currentStep"
        />

        Enter Current Step: <input
            v-model="currentStep"
            type="number"
        >
    </div>
</template>

<script>
    export default {
        data () {
            return {
                currentStep: 1,
            }
        },

        mounted() {
            console.log('Component mounted.')
        },

    }
</script>
