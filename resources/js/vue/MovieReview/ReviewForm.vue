<template>
    <div id="form-container">
        <form>
            <ReviewerStep v-if="currentStep == 1" @update="(fname, lname) => updateReviewer(fname, lname)"></ReviewerStep>
            <MovieStep v-else-if="currentStep == 2" @update="movie => updateMovie(movie)"></MovieStep>
        </form>
    </div>
</template>

<script>
import { ref } from 'vue';
import ReviewerStep from './ReviewSteps/ReviewerStep.vue';
import MovieStep from './ReviewSteps/MovieStep.vue';
    export default {
    components: { ReviewerStep, MovieStep },
    setup(props, { emit }) {
        const firstName = ref('');
        const lastName = ref('');
        const selectedMovie = ref('');
        const currentStep = ref(1);

        const updateReviewer = function(fname, lname) {
            firstName.value = fname;
            lastName.value = lname;
            currentStep.value++;
        }

        const updateMovie = function(movie) {
            selectedMovie.value = movie;
            currentStep.value++;
        }

        return {
            firstName,
            lastName,
            selectedMovie,
            updateReviewer,
            updateMovie,
            currentStep
        }
    }
}
</script> 

<style>
#form-container {
    padding: 2rem;
    width: 40%;
}

.form-option {
    padding-bottom: 1rem;
}

</style>