<script setup>
import { Link } from "@inertiajs/vue3";

defineProps({
    links: Array,
});
</script>

<template>
    <div class="inline-flex">
        <template v-for="(link, key) in links" :key="key">
            <div
                v-if="link.url === null"
                v-html="link.label"
                class="mb-1 mr-1 px-2 py-1 text-gray-400 text-sm leading-4 border rounded"
            ></div>
            <Link
                v-else
                :href="link.url"
                v-html="link.label"
                class="mb-1 mr-1 px-2 py-1 text-sm leading-4 border rounded focus:text-gray-500 focus:border-indigo-500 hover:bg-gray-300"
                :class="{ 'bg-gray-400': link.active }"
            />
        </template>
    </div>
</template>
