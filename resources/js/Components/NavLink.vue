<script setup>
import { computed } from 'vue';
import { Link } from '@inertiajs/vue3';

const props = defineProps({
    href: String,
    active: Boolean,
});

const classes = computed(() => {
    return props.active
        ? 'inline-flex items-center px-2 pt-1 border-b-3 border-indigo-600 text-sm font-medium leading-5 text-indigo-600 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
        : 'inline-flex items-center px-2 pt-1 border-b-3 border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-400 hover:border-gray-400 focus:outline-none focus:text-gray-300 focus:border-gray-300 transition duration-150 ease-in-out';
});
</script>

<template>
    <Link :href="href" :class="classes">
        <slot />
    </Link>
</template>
