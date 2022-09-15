<template>
    <h2>Your review</h2>
    <div class="form-option">
        <p>Please select a rating:</p>
        <input type="radio" id="rate1" name="rating" value="1" v-model="rating" />
        <label for="rate1">1</label>
        <input type="radio" id="rate2" name="rating" value="2" v-model="rating" />
        <label for="rate2">2</label>
        <input type="radio" id="rate3" name="rating" value="3" v-model="rating" />
        <label for="rate3">3</label>
        <input type="radio" id="rate4" name="rating" value="4" v-model="rating" />
        <label for="rate4">4</label>
        <input type="radio" id="rate5" name="rating" value="5" v-model="rating" />
        <label for="rate5">5</label>
        <p v-if="errors.rating" class="error">
            {{ errors.rating }}
        </p>
    </div>
    <div class="form-option">
        <p><label for="review-field">Movie review (optional)</label></p>
        <textarea id="review-field" name="review-field" rows="4" cols="50" v-model="review"
        >Enter your review here...
        </textarea>
        <p v-if="errors.review" class="error">
            {{ errors.review }}
        </p>
    </div>
    <input type="button" value="Next" @click="nextStep">
</template>
<script>
import { ref } from "vue";

export default {
    emits: ["update"],
    setup(props, { emit }) {
        const errors = ref({
            rating: null,
            review: null,
        });
        const rating = ref(0);
        const review = ref("");
        const checkForm = function () {
            if (rating.value < 1 || rating.value > 5)
                errors.value.rating = "Please select a rating between 1 and 5.";
            else errors.value.rating = "";
            if (review.value.length > 300)
                errors.value.review = "Please use 300 character or less.";
            else errors.value.review = "";
        };
        const nextStep = function () {
            checkForm();
            if (!Object.values(errors.value).some((x) => x)) {
                emit("update", rating.value, review.value);
            }
        };
        return {
            errors,
            nextStep,
            rating,
            review,
        };
    },
};
</script>
<style>
.error {
    color: red;
}
</style>
