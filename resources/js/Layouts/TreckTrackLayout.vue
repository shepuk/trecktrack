<script setup>
import { ref } from "vue";
import { Head, Link, router } from "@inertiajs/vue3";
import ApplicationMark from "@/Components/ApplicationMark.vue";
import Banner from "@/Components/Banner.vue";
import Dropdown from "@/Components/Dropdown.vue";
import DropdownLink from "@/Components/DropdownLink.vue";
import NavLink from "@/Components/NavLink.vue";
import ResponsiveNavLink from "@/Components/ResponsiveNavLink.vue";
import UserIcon from "../../svgs/feather/user.svg";
import Eye from "../../svgs/feather/eye.svg";
import PlusCircle from "../../svgs/feather/plus-circle.svg";
import Activity from "../../svgs/feather/activity.svg";
import Info from "../../svgs/feather/info.svg";



defineProps({
    title: String,
    canLogin: Boolean,
    canRegister: Boolean,
    laravelVersion: String,
    phpVersion: String,
});

const showingNavigationDropdown = ref(false);

const switchToTeam = (team) => {
    router.put(
        route("current-team.update"),
        {
            team_id: team.id,
        },
        {
            preserveState: false,
        }
    );
};

const logout = () => {
    router.post(route("logout"));
};

</script>

<template>
    <div>
        <Head :title="title" />

        <Banner />

        <nav
            className="sticky top-0 z-10 bg-white backdrop-filter backdrop-blur-lg bg-opacity-30 border-b border-gray-200"
        >
            <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div className="flex items-center justify-between h-16">
                    <span className="text-2xl text-gray-900 font-semibold"
                        >treck•track</span
                    >

                    <div className="flex space-x-4 text-gray-900">
                        <!-- Settings Dropdown -->
                        <div v-if="$page.props.auth.user" class="ml-3 relative">
                            <Dropdown align="right" width="48">
                                <template #trigger>
                                    <button
                                        v-if="
                                            $page.props.jetstream
                                                .managesProfilePhotos
                                        "
                                        class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition"
                                    >
                                        <img
                                            class="h-8 w-8 rounded-full object-cover"
                                            :src="
                                                $page.props.auth.user
                                                    .profile_photo_url
                                            "
                                            :alt="$page.props.auth.user.name"
                                        />
                                    </button>

                                    <span v-else class="inline-flex">
                                        <button
                                            type="button"
                                            class="pl-2 pr-1 py-[1px] inline-flex items-center border border-transparent bg-black text-white text-sm hover:rotate-6 hover:scale-[1.05] transition-all diration-200"
                                        >
                                            {{ $page.props.auth.user.name }}

                                            <UserIcon
                                                class="scale-[0.7] ml-2"
                                            />
                                        </button>
                                    </span>
                                </template>

                                <template #content>
                                    <!-- Account Management -->
                                    <div
                                        class="block px-4 py-2 text-xs text-gray-400"
                                    >
                                        Manage Account
                                    </div>

                                    <DropdownLink :href="route('profile.show')">
                                        Profile
                                    </DropdownLink>

                                    <DropdownLink
                                        v-if="
                                            $page.props.jetstream.hasApiFeatures
                                        "
                                        :href="route('api-tokens.index')"
                                    >
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

                        <div v-else>
                            <Link
                                :href="route('login')"
                                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                                >Log in</Link
                            >

                            <Link
                                :href="route('register')"
                                class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                                >Register</Link
                            >
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <div id="gradient-changer" class="w-full max-w-7xl mx-auto mt-6">
            <div class="w-full h-full text-white px-8 py-4 flex gap-8">
                <button
                    type="button"
                    class="pl-2 pr-1 py-[1px] inline-flex items-center border border-transparent bg-black text-white text-sm hover:scale-[1.05] transition-all diration-200"
                >
                    View trecks

                    <Eye class="scale-[0.7] ml-2" />
                </button>

                <button
                    type="button"
                    class="pl-2 pr-1 py-[1px] inline-flex items-center border border-transparent bg-black text-white text-sm hover:scale-[1.05] transition-all diration-200"
                >
                    Submit treck

                    <PlusCircle class="scale-[0.7] ml-2" />
                </button>

                <button
                    type="button"
                    class="pl-2 pr-1 py-[1px] inline-flex items-center border border-transparent bg-black text-white text-sm hover:scale-[1.05] transition-all diration-200"
                >
                    Help!

                    <Activity class="scale-[0.7] ml-2" />
                </button>

                <button
                    type="button"
                    class="pl-2 pr-1 py-[1px] inline-flex items-center border border-transparent bg-black text-white text-sm hover:scale-[1.05] transition-all diration-200"
                >
                    Information

                    <Info class="scale-[0.7] ml-2" />
                </button>
            </div>
        </div>
        <slot />
    </div>
</template>
