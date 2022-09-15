<template>
    <StepIndicator :current-step="currentStep"></StepIndicator>
    <div id="form-container">
        <form>
            <ReviewerStep
                v-if="currentStep == 1"
                @update="(fname, lname) => updateReviewer(fname, lname)"
            ></ReviewerStep>
            <MovieStep
                v-else-if="currentStep == 2"
                @update="(movie) => updateMovie(movie)"
            ></MovieStep>
            <RatingStep
                v-else-if="currentStep == 3"
                @update="(rating, review) => updateReview(rating, review)"
            ></RatingStep>
            <DetailsStep
                v-else-if="currentStep == 4"
                @update="
                    (wouldRecommend, goldClass) =>
                        updateDetails(wouldRecommend, goldClass)
                "
            ></DetailsStep>
            <ConfirmationStep
                v-else-if="currentStep == 5"
                :first-name="firstName"
                :last-name="lastName"
                :selected-movie="selectedMovie"
                :movie-rating="movieRating"
                :movie-review="movieReview"
                :would-recommend-to-friend="wouldRecommendToFriend"
                :saw-in-gold-class="sawInGoldClass"
                @returnToStep="(step) => returnToStep(step)"
                @complete="storeReview"
            >
            </ConfirmationStep>
        </form>
    </div>
</template>

<script>
import { ref } from "vue";
import ReviewerStep from "./ReviewSteps/ReviewerStep.vue";
import MovieStep from "./ReviewSteps/MovieStep.vue";
import RatingStep from "./ReviewSteps/RatingStep.vue";
import DetailsStep from "./ReviewSteps/DetailsStep.vue";
import ConfirmationStep from "./ReviewSteps/ConfirmationStep.vue";
import axios from "axios";
import StepIndicator from "../GenericComponents/StepIndicator.vue";
export default {
    components: {
    ReviewerStep,
    MovieStep,
    RatingStep,
    DetailsStep,
    ConfirmationStep,
    StepIndicator
},
    setup(props, { emit }) {
        const firstName = ref("");
        const lastName = ref("");
        const selectedMovie = ref("");
        const currentStep = ref(1);
        const movieRating = ref(0);
        const movieReview = ref("");
        const wouldRecommendToFriend = ref(false);
        const sawInGoldClass = ref(false);
        const errors = ref({});

        const updateReviewer = function (fname, lname) {
            firstName.value = fname;
            lastName.value = lname;
            currentStep.value++;
        };

        const updateMovie = function (movie) {
            selectedMovie.value = movie;
            currentStep.value++;
        };

        const updateReview = function (rating, review) {
            movieRating.value = rating;
            movieReview.value = review;
            currentStep.value++;
        };

        const updateDetails = function (wouldRecommend, goldClass) {
            wouldRecommendToFriend.value = wouldRecommend;
            sawInGoldClass.value = goldClass;
            currentStep.value++;
        };

        const returnToStep = function (step) {
            currentStep.value = step;
        };

        const storeReview = async function () {
            try {
                const { data: res } = await axios.post(
                    `/api/movie-review/store`,
                    {
                        first_name: firstName.value,
                        last_name: lastName.value,
                        selected_movie: selectedMovie.value,
                        movie_rating: movieRating.value,
                        movie_review: movieReview.value,
                        would_recommend_to_friend: wouldRecommendToFriend.value,
                        saw_in_gold_class: sawInGoldClass.value,
                    }
                );
            } catch (err) {
                console.log('this should display an error instead')
                console.log(err);
            }
        };
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
            currentStep,
            storeReview,
            returnToStep,
        };
    },
};
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
