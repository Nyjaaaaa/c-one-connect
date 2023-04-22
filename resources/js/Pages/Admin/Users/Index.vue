<script setup>
import AdministratorLayout from "@/Layouts/AdministratorLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
import SuccessMessage from "@/Components/SuccessMessage.vue";
import Pagination from "@/Components/Pagination.vue";
import ResponsivePagination from "@/Components/ResponsivePagination.vue";

const props = defineProps({
    users: Object,
});
</script>

<template>
    <Head title="Users" />

    <AdministratorLayout>
        <!-- Main content header -->
        <SuccessMessage v-if="$page.props.flash.message">
            <div class="ml-3 text-sm font-medium text-green-700">
                {{ $page.props.flash.message }}
            </div>
        </SuccessMessage>
        <div
            class="flex flex-col items-start justify-between pb-6 space-y-4 border-b lg:items-center lg:space-y-0 lg:flex-row"
        >
            <h1 class="text-2xl font-semibold whitespace-nowrap">Users</h1>
            <Link
                :href="route('admin.users.create')"
                class="flex bg-gray-800 p-2 rounded-full border border-transparent hover:bg-gray-400 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
            >
                <span>
                    <svg
                        class="w-5 h-5 text-gray-200"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z"
                        />
                    </svg>

                    <path stroke-linecap="round" stroke-linejoin="round"></path>
                </span>
            </Link>
        </div>

        <!-- Start Content -->
        <div class="flex flex-col mt-6">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div
                    class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8"
                >
                    <div
                        class="overflow-hidden border-b border-gray-200 rounded-md shadow-md"
                    >
                        <table
                            class="min-w-full overflow-x-scroll divide-y divide-gray-200"
                        >
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                                    >
                                        Name
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                                    >
                                        Email
                                    </th>
                                    <th
                                        scope="col"
                                        class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-500 uppercase"
                                    >
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                <tr
                                    v-for="user in users.data"
                                    class="transition-all hover:bg-gray-100 hover:shadow-lg"
                                >
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ user.name }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ user.email }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <Link
                                            :href="
                                                route(
                                                    'admin.users.destroy',
                                                    user.id
                                                )
                                            "
                                            method="delete"
                                            as="button"
                                            type="button"
                                            class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full hover:bg-red-300 hover:shadow-lg"
                                        >
                                            Delete
                                        </Link>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="mt-2 hidden sm:block">
                        <Pagination :links="users.links" />
                    </div>
                    <div class="mt-2 block sm:hidden">
                        <ResponsivePagination :links="users.links" />
                    </div>
                </div>
            </div>
        </div>
    </AdministratorLayout>
</template>
