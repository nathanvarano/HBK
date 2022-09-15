<template>
    <div id="form-container">
        <form>
            <ReviewerStep v-if="currentStep == 1" @update="(fname, lname) => updateReviewer(fname, lname)"></ReviewerStep>
            <MovieStep v-else-if="currentStep == 2" @update="movie => updateMovie(movie)"></MovieStep>
            <RatingStep v-else-if="currentStep == 3" @update="(rating, review) => updateReview(rating, review)"></RatingStep>
        </form>
    </div>
</template>

<script>
import { ref } from 'vue';
import ReviewerStep from './ReviewSteps/ReviewerStep.vue';
import MovieStep from './ReviewSteps/MovieStep.vue';
import RatingStep from './ReviewSteps/RatingStep.vue';
    export default {
    components: { ReviewerStep, MovieStep, RatingStep },
    setup(props, { emit }) {
        const firstName = ref('');
        const lastName = ref('');
        const selectedMovie = ref('');
        const currentStep = ref(1);
        const movieRating = ref(0);
        const movieReview = ref('');

        const updateReviewer = function(fname, lname) {
            firstName.value = fname;
            lastName.value = lname;
            currentStep.value++;
        }

        const updateMovie = function(movie) {
            selectedMovie.value = movie;
            currentStep.value++;
        }

        const updateReview = function(rating, review) {
            movieRating.value = rating;
            movieReview.value = review;
            currentStep.value++;
        }

        return {
            firstName,
            lastName,
            selectedMovie,
            movieRating,
            movieReview,
            updateReviewer,
            updateMovie,
            updateReview,
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