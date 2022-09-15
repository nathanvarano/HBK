<template>
    <h2>Confirm review</h2>
    <div class="form-option">
        <div style="display:flex">
            <h3 style="margin-bottom:4px;display:inline">Reviewer (Step 1)</h3> 
            <input type="button" value="Edit" class="edit-button" @click="returnToStep(1)">
        </div>
        <p style="font-weight:bold;margin:2px;display:inline">First name: </p>{{ firstName }} <br>
        <p style="font-weight:bold;margin:2px;display:inline">Last name: </p>{{ lastName }}
    </div>

    <div class="form-option">
        <div style="display:flex">
            <h3 style="margin-bottom:4px;display:inline">Movie (Step 2)</h3> 
            <input type="button" value="Edit" class="edit-button" @click="returnToStep(2)">
        </div>
        <p style="font-weight:bold;margin:2px;display:inline">Selected movie: </p>{{ selectedMovie }}
    </div>
    <div class="form-option">
        <div style="display:flex">
            <h3 style="margin-bottom:4px;display:inline">Review (Step 3)</h3> 
            <input type="button" value="Edit" class="edit-button" @click="returnToStep(3)">
        </div>
        <p style="font-weight:bold;margin:2px;display:inline">Movie rating: </p>{{ movieRating }}
        <p style="font-weight:bold;margin:2px;" v-if="movieReview">Movie review: </p>{{ movieReview }}
    </div>
    <div class="form-option">
        <div style="display:flex">
            <h3 style="margin-bottom:4px;display:inline">Additional details (Step 4)</h3> 
            <input type="button" value="Edit" class="edit-button" @click="returnToStep(4)">
        </div>
        <p style="font-weight:bold;margin:2px;display:inline">Would recommend to friend:</p>{{ wouldRecommendToFriend }} <br>
        <p style="font-weight:bold;margin:2px;display:inline">Saw in gold class: </p>{{ sawInGoldClass }}
    </div>
    <input type="button" value="Submit" @click="$emit('complete')" />
</template>
<script>

export default {
    emits: ["returnToStep", "complete"],
    props: {
        firstName: {
            type: String,
            required: true
        },
        lastName: {
            type: String,
            required: true
        },
        selectedMovie: {
            type: String,
            required: true
        },
        movieRating: {
            type: Number,
            required: true
        },
        movieReview: {
            type: String,
            required: true
        },
        wouldRecommendToFriend: {
            type: Boolean,
            required: true
        },
        sawInGoldClass: {
            type: Boolean,
            required: true
        },
    },
    setup(props, { emit }) {
        const returnToStep = function(step) {
            emit("returnToStep", step);
        }
        return {
            returnToStep
        };
    },
};
</script>
<style>
.error {
    color: red;
}

.edit-button {
    border: none;
    background: unset;
    color: blue;
    font-weight: bold;
}
</style>
