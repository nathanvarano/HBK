<template>
    <div id="form-container">
        <form>
            <ReviewerStep @update="(fname, lname) => updateReviewer(fname, lname)"></ReviewerStep>
        </form>
    </div>
</template>

<script>
import { ref } from 'vue';
import ReviewerStep from './ReviewSteps/ReviewerStep.vue';
    export default {
    components: { ReviewerStep },
    setup(props, { emit }) {
        const firstName = ref('');
        const lastName = ref('');

        const updateReviewer = function(fname, lname) {
            console.log('test');
            firstName.value = fname;
            lastName.value = lname;
        }

        return {
            firstName,
            lastName,
            updateReviewer
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