<template>
    <div id="app-container">
        <h1>
            HBK example app
        </h1>
        <review-form></review-form>
    </div>
</template>

<script>
import ReviewForm from "./MovieReview/ReviewForm.vue"
export default {
    components: {
        ReviewForm
    }
}
</script>