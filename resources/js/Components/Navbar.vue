<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    router.put(route('current-team.update'), {
        team_id: team.id,
    }, {
        preserveState: false,
    });
};

const logout = () => {
    router.post(route('logout'));
};
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
            <NavLink v-if="$page.props.user.permissions.includes('access dashboard')" :href="route('dashboard')" :active="route().current('frontend.explore')">
                儀錶板
                <i class="ml-2 text-xl fa fa-dashboard"></i>
            </NavLink>
        </div>

        <div class="flex items-center gap-x-6" v-if="!$page.props.auth.user">
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
        <div class="hidden sm:flex sm:items-center sm:ms-6" v-else>
            <!-- Settings Dropdown -->
            <div class="ms-3 relative">
                <Dropdown align="right" width="48">
                    <template #trigger>
                        <button v-if="$page.props.jetstream.managesProfilePhotos" class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url ?? null" :alt="$page.props.auth.user.name">
                        </button>

                        <span v-else class="inline-flex rounded-md">
                            <button type="button" class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                {{ $page.props.auth.user.name }}

                                <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                </svg>
                            </button>
                        </span>
                    </template>

                    <template #content>
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            Manage Account
                        </div>

                        <DropdownLink :href="route('profile.show')">
                            Profile
                        </DropdownLink>

                        <DropdownLink v-if="$page.props.jetstream.hasApiFeatures" :href="route('api-tokens.index')">
                            API Tokens
                        </DropdownLink>

                        <div class="border-t border-gray-200" />

                        <!-- Authentication -->
                        <form @submit.prevent="logout">
                            <DropdownLink as="button">
                                Log Out
                            </DropdownLink>
                        </form>
                    </template>
                </Dropdown>
            </div>
        </div>

        <!-- Hamburger -->
        <div class="-me-2 flex items-center sm:hidden">
            <button class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out" @click="showingNavigationDropdown = ! showingNavigationDropdown">
                <svg
                    class="h-6 w-6"
                    stroke="currentColor"
                    fill="none"
                    viewBox="0 0 24 24"
                >
                    <path
                        :class="{'hidden': showingNavigationDropdown, 'inline-flex': ! showingNavigationDropdown }"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"
                    />
                    <path
                        :class="{'hidden': ! showingNavigationDropdown, 'inline-flex': showingNavigationDropdown }"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"
                    />
                </svg>
            </button>
        </div>

    </nav>

</template>