<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue'
</script>

<template>

    <nav class="bg-white shadow px-6 py-4 flex gap-x-8 justify-center">
        
        <NavLink :href="route('frontend.home')" :active="route().current('frontend.home')">首頁</NavLink>
        <NavLink :href="route('frontend.timeline')" :active="route().current('frontend.timeline')">時間軸</NavLink>
        <NavLink :href="route('frontend.explore')" :active="route().current('frontend.explore')">探索</NavLink>

    </nav>

</template>