<script setup>

import NavBar from "@/Components/NavBar.vue";

</script>

<template>
    <NavBar></NavBar>
    <div class="">
        <router-view v-slot="{ Component, route }">
            <div :key="route.name">
                <Component :is="Component" />
            </div>
        </router-view>
    </div>
</template>

<style scoped>

</style>
