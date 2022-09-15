<template>
    <h2>Additional details</h2>
    <div class="form-option">
        <input type="checkbox" id="see-again" name="see-again" value="false" v-model="wouldRecommend" />
        <label for="see-again"> I Would recommend the movie to a friend</label>
        <p v-if="errors.would_recommend" class="error">
            {{ errors.would_recommend }}
        </p>
    </div>
    <div class="form-option">
        <input
            type="checkbox"
            id="gold-class"
            name="gold-class"
            value="false"
            v-model="sawInGoldClass"
        />
        <label for="gold-class"> I saw the movie in gold class</label>
        <p v-if="errors.saw_in_gold_class" class="error">
            {{ errors.saw_in_gold_class }}
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
            would_recommend: null,
            saw_in_gold_class: null,
        });
        const wouldRecommend = ref(false);
        const sawInGoldClass = ref(false);
        const nextStep = function () {
            emit("update", wouldRecommend.value, sawInGoldClass.value);
        };
        return {
            errors,
            nextStep,
            wouldRecommend,
            sawInGoldClass,
        };
    },
};
</script>
<style>
.error {
    color: red;
}
</style>
