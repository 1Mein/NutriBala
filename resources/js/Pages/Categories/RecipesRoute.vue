<script setup>
import { onMounted, reactive } from 'vue';


const state = reactive({
    user: {}
});

function fetchUser() {
    return axios.get('api/v1/user')
        .then(response => state.user = response.data);
}
onMounted(fetchUser);
console.log(state)
</script>

<template>
REcipessss
</template>

<style scoped>

</style>
