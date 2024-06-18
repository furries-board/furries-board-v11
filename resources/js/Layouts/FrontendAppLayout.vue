<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import Navbar from '@/Components/Navbar.vue'

defineProps({
    title: String,
});

</script>

<template>

    <div>
        <Head :title="title" />
    
        <Navbar></Navbar>

        <!-- Page Content -->
        <div class="p-12">
            <slot /> 
        </div>

    </div>

</template>