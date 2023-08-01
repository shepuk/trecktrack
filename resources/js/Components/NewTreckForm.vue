<script setup>
import Feather from "../../svgs/feather/feather.svg";

import { reactive } from "vue";
import { router } from "@inertiajs/vue3";

const form = reactive({
    title: null,
    description: null,
    date: null,
    rating: null,
});

function submit() {
    router.get("/newtreck", form);
}
</script>

<template>
    <div
        class="content-box max-w-7xl mx-auto my-8 px-8 py-12 m-2 mt-6 bg-white"
    >
        <h1 class="text-2xl font-bold flex gap-2 mb-">
            New Adventure <Feather />
        </h1>
        <p class="mb-8 text-xl text-gray-500">
            Enter details for a new activity
        </p>

        <!-- flash message start -->
        <div
            v-if="$page.props.flash.message"
            class="p-4 mb-4 text-sm text-green-700 bg-green-100 dark:bg-green-200 dark:text-green-800"
            role="alert"
        >
            <span class="font-medium">
                {{ $page.props.flash.message }}
            </span>
        </div>
        <!-- flash message end -->

        <form @submit.prevent="submit">
            <div class="flex flex-col mb-8">
                <label for="title" class="text-sm text-slate-500 mb-2"
                    >Treck title</label
                >
                <input
                    type="text"
                    v-model="form.title"
                    name="title"
                    class="w-[300px] border-0 border-b-[1px] bg-slate-100 border-black"
                />
                <p class="text-sm text-slate-500 mt-1">
                    Eg. Walk through Fangorn Forest
                </p>
            </div>

            <div class="flex flex-col mb-8">
                <label for="date" class="text-sm text-slate-500 mb-2"
                    >Date completed</label
                >
                <input
                    type="date"
                    v-model="form.date"
                    name="date"
                    class="w-[300px] border-0 border-b-[1px] bg-slate-100 border-black"
                />
                <p class="text-sm text-slate-500 mt-1">Eg. 23/07/2023</p>
            </div>

            <div class="flex flex-col mb-8">
                <label for="description" class="text-sm text-slate-500 mb-2"
                    >Treck description</label
                >
                <textarea
                    type="text"
                    name="description"
                    v-model="form.description"
                    class="w-[300px] h-[100px] border-0 border-b-[1px] bg-slate-100 border-black"
                />
                <p class="text-sm text-slate-500 mt-1">
                    Eg. A challenging hike through wild forests
                </p>
            </div>

            <p class="text-sm text-slate-500 -mb-2">Rate this activity</p>
            <div class="stars mb-8">
                <input checked type="radio" id="star1" name="rating" value="1" />
                <input type="radio" id="star2" name="rating" value="2" /><input
                    type="radio"
                    id="star3"
                    name="rating"
                    value="3"
                /><input type="radio" id="star4" name="rating" value="4" />
                <input type="radio" id="star5" name="rating" value="5" />

                <label for="star1">1 star</label
                ><label for="star2">2 stars</label
                ><label for="star3">3 stars</label
                ><label for="star4">4 stars</label
                ><label for="star5">5 stars</label>
            </div>

            <button
                class="px-6 py-3 inline-flex items-center border border-transparent bg-black text-white text-sm hover:rotate-6 hover:scale-[1.05] transition-all diration-200"
                type="submit"
            >
                Button
            </button>
        </form>
    </div>
</template>
