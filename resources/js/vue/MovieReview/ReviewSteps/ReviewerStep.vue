<template>
    <h2>Reviewer details</h2>
    <div class="form-option">
        <label for="first-name">First name: </label>
        <input type="text" id="first-name" name="first-name" v-model="firstName">
        <p v-if="errors.first_name" class="error">
            {{ errors.first_name }}
        </p>
    </div>

    <div class="form-option">
        <label for="last-name">Last name: </label>
        <input type="text" id="last-name" name="last-name" v-model="lastName">
        <p v-if="errors.last_name" class="error">
            {{ errors.last_name }}
        </p>
    </div>

    <input type="button" value="Next" @click="nextStep">
</template>
<script>
import { ref } from 'vue';

export default {
    emits: ['update'],
    setup(props, { emit }) {
        const errors = ref({
            first_name: null,
            last_name: null,
        });
        const firstName = ref('');
        const lastName = ref('');
        const checkForm = function() {
            if (firstName.value.length < 1 || firstName.value.length > 50) errors.value.first_name = "Please enter a valid first name.";
            else errors.value.first_name = '';
            if (lastName.value.length < 1 || lastName.value.length > 50) errors.value.last_name = "Please enter a valid last name.";
            else errors.value.last_name = '';
        };
        const nextStep = function() {
            checkForm();
            if (!Object.values(errors.value).some(x => x)) {
                emit('update', firstName.value, lastName.value);
            }
        }
        return {
            errors,
            nextStep,
            firstName,
            lastName
        };
    },
};
</script>
<style>
    .error {
        color: red;
    }
</style>