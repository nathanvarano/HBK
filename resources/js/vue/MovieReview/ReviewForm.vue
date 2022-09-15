<template>
    <div id="form-container">
        <form>
            <ReviewerStep v-if="currentStep == 1" @update="(fname, lname) => updateReviewer(fname, lname)"></ReviewerStep>
            <MovieStep v-else-if="currentStep == 2" @update="movie => updateMovie(movie)"></MovieStep>
            <RatingStep v-else-if="currentStep == 3" @update="(rating, review) => updateReview(rating, review)"></RatingStep>
            <DetailsStep v-else-if="currentStep == 4" @update="(wouldRecommend, goldClass) => updateDetails(wouldRecommend, goldClass)"></DetailsStep>
        </form>
    </div>
</template>

<script>
import { ref } from 'vue';
import ReviewerStep from './ReviewSteps/ReviewerStep.vue';
import MovieStep from './ReviewSteps/MovieStep.vue';
import RatingStep from './ReviewSteps/RatingStep.vue';
import DetailsStep from './ReviewSteps/DetailsStep.vue';
    export default {
    components: { ReviewerStep, MovieStep, RatingStep, DetailsStep },
    setup(props, { emit }) {
        const firstName = ref('');
        const lastName = ref('');
        const selectedMovie = ref('');
        const currentStep = ref(1);
        const movieRating = ref(0);
        const movieReview = ref('');
        const wouldRecommendToFriend = ref(false);
        const sawInGoldClass = ref(false);

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

        const updateDetails = function(wouldRecommend, goldClass) {
            wouldRecommendToFriend.value = wouldRecommend;
            sawInGoldClass.value = goldClass;
            currentStep.value++;
        }
        return {
            firstName,
            lastName,
            selectedMovie,
            movieRating,
            movieReview,
            wouldRecommendToFriend,
            sawInGoldClass,
            updateReviewer,
            updateMovie,
            updateReview,
            updateDetails,
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