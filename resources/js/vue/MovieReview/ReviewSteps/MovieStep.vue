<template>
    <h2>Movie</h2>
    <div class="form-option">
        <label for="movies-select">Select a movie: </label>
        <select name="movies" id="movies-select" v-model="selectedMovie">
            <option default></option>
            <option v-for="movie in movieList"> {{ movie }}</option>
        </select>
        <p v-if="errors.selected_movie" class="error">
            {{ errors.selected_movie }}
        </p>
    </div>

    <input type="button" value="Next" @click="nextStep">
</template>
<script>
import axios from 'axios';
import { ref } from 'vue';

export default {
    emits: ['update'],
    setup(props, { emit }) {
        const errors = ref({
            selected_movie: null,
        });
        const selectedMovie = ref('');
        const movieList = ref([]);
        const getMovieList = async function() {
            const { data: res } = await axios.get(`api/movies`);
            movieList.value = res;
        }
        getMovieList();
        const checkForm = function() {
            if (!movieList.value.includes(selectedMovie.value)) errors.value.selected_movie = "Please select a valid movie.";
            else errors.value.selected_movie = '';
        };
        const nextStep = function() {
            checkForm();
            if (!Object.values(errors.value).some(x => x)) {
                emit('update', selectedMovie);
            }
        }
        return {
            errors,
            nextStep,
            movieList,
            selectedMovie,
        };
    },
};
</script>
<style>
    .error {
        color: red;
    }

    select {
        width: 200px;
    }
</style>