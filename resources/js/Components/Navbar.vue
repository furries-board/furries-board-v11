<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue'
</script>

<template>

    <nav class="bg-white shadow px-10 py-2 flex justify-between">
        
        <div class="flex gap-x-6">
            <NavLink :href="route('frontend.home')" :active="route().current('frontend.home')">
                首頁
                <i class="ml-2 text-xl fa fa-home"></i>
            </NavLink>
            <NavLink :href="route('frontend.timeline')" :active="route().current('frontend.timeline')">
                時間軸
                <i class="ml-2 text-xl fa fa-area-chart"></i>
            </NavLink>
            <NavLink :href="route('frontend.explore')" :active="route().current('frontend.explore')">
                探索
                <i class="ml-2 text-xl fa fa-wpexplorer"></i>
            </NavLink>
        </div>

        <div class="flex items-center gap-x-6">
            <Link :href="route('login')">
                <button class="px-5 py-2 bg-[#29284e] text-white hover:bg-gray-700 rounded-full">
                    <i class="mr-2 fa fa-lock"></i>
                    登入
                </button>
            </Link>
            <Link :href="route('register')">
                <button class="text-gray-600 hover:text-black">註冊</button>
            </Link>
        </div>

    </nav>

</template>