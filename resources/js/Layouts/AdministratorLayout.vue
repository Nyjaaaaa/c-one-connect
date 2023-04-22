<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";
import { vOnClickOutside } from "@vueuse/components";

const isSidebarOpen = ref(false);
const isUserMenuOpen = ref(false);
const isNotificationOpen = ref(false);

function closeUserMenu() {
    isUserMenuOpen.value = false;
}

function closeNotification() {
    isNotificationOpen.value = false;
}
</script>

<template>
    <div class="flex h-screen overflow-y-hidden bg-white">
        <!-- Sidebar backdrop -->
        <div
            v-show="isSidebarOpen"
            class="fixed inset-0 z-10 bg-black bg-opacity-20 sm:hidden"
            style="
                backdrop-filter: blur(14px);
                -webkit-backdrop-filter: blur(14px);
            "
        ></div>
        <!-- Sidebar -->
        <aside
            class="fixed inset-y-0 z-10 flex flex-col flex-shrink-0 w-64 max-h-screen overflow-hidden transition-all transform bg-white border-r shadow-lg lg:z-auto lg:static lg:shadow-none"
            :class="{
                '-translate-x-full lg:translate-x-0 lg:w-20': !isSidebarOpen,
            }"
        >
            <!-- sidebar header -->
            <div
                class="flex items-center justify-between flex-shrink-0 p-2"
                :class="{ 'lg:justify-center': !isSidebarOpen }"
            >
                <span
                    class="p-2 text-xl font-semibold leading-8 tracking-wider uppercase whitespace-nowrap"
                >
                    C<span :class="{ 'lg:hidden': !isSidebarOpen }"
                        >-ONE CONNECT</span
                    >
                </span>
                <button
                    @click="isSidebarOpen = !isSidebarOpen"
                    class="p-2 rounded-md lg:hidden"
                >
                    <svg
                        class="w-6 h-6 text-gray-600"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M6 18L18 6M6 6l12 12"
                        />
                    </svg>
                </button>
            </div>
            <!-- Sidebar links -->
            <nav class="flex-1 overflow-hidden hover:overflow-y-auto">
                <div
                    class="flex flex-col p-4 space-y-1 font-medium border-b block sm:hidden"
                >
                    <span class="text-gray-800">{{
                        $page.props.auth.user.name
                    }}</span>
                    <span class="text-sm text-gray-400">{{
                        $page.props.auth.user.email
                    }}</span>
                </div>
                <ul class="p-2 overflow-hidden">
                    <li>
                        <Link
                            :href="route('admin.index')"
                            class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
                            :class="{
                                'justify-center': !isSidebarOpen
                            }"
                        >
                            <span>
                                <svg
                                    class="w-6 h-6 text-gray-400"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"
                                    />
                                </svg>

                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                ></path>
                            </span>
                            <span :class="{ 'lg:hidden': !isSidebarOpen }"
                                >Dashboard</span
                            >
                        </Link>
                    </li>
                    <li>
                        <Link
                            :href="route('admin.users.index')"
                            class="flex items-center p-2 space-x-2 rounded-md hover:bg-gray-100"
                            :class="{
                                'justify-center': !isSidebarOpen
                            }"
                        >
                            <span>
                                <svg
                                    class="w-6 h-6 text-gray-400"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"
                                    />
                                </svg>
                            </span>
                            <span :class="{ 'lg:hidden': !isSidebarOpen }"
                                >Users</span
                            >
                        </Link>
                    </li>
                    <!-- Sidebar Links... -->
                </ul>
            </nav>
            <!-- Sidebar footer -->
            <div class="flex-shrink-0 p-2 border-t max-h-14">
                <button
                    class="flex items-center justify-center w-full px-4 py-2 space-x-1 font-medium tracking-wider uppercase bg-gray-100 border rounded-md focus:outline-none focus:ring"
                >
                    <span>
                        <svg
                            class="w-6 h-6"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                            />
                        </svg>
                    </span>
                    <Link
                        :href="route('logout')"
                        method="post"
                        as="button"
                        class="uppercase"
                        :class="{ 'lg:hidden': !isSidebarOpen }"
                    >
                        Logout
                    </Link>
                </button>
            </div>
        </aside>

        <div class="flex flex-col flex-1 h-full overflow-hidden">
            <header class="flex-shrink-0 border-b">
                <div class="flex items-center justify-between p-2">
                    <!-- Navbar left -->
                    <div class="flex items-center space-x-3">
                        <span
                            class="p-2 text-xl font-semibold tracking-wider uppercase lg:hidden"
                            >C-0NE CONNECT</span
                        >
                        <!-- Toggle sidebar button -->
                        <button
                            @click="isSidebarOpen = !isSidebarOpen"
                            class="p-2 rounded-md focus:outline-none focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                        >
                            <svg
                                class="w-4 h-4 text-gray-600"
                                :class="{
                                    'transform transition-transform -rotate-180':
                                        isSidebarOpen,
                                }"
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M13 5l7 7-7 7M5 5l7 7-7 7"
                                />
                            </svg>
                        </button>
                    </div>

                    <!-- Navbar right -->
                    <div class="relative flex items-center space-x-3">
                        <div class="relative hidden sm:block">
                            <!-- red dot -->
                            <div
                                class="absolute right-0 p-1 bg-red-400 rounded-full animate-ping"
                            ></div>
                            <div
                                class="absolute right-0 p-1 bg-red-400 border rounded-full"
                            ></div>
                            <button
                                @click="isNotificationOpen = true"
                                class="p-2 bg-gray-100 rounded-full hover:bg-gray-200 focus:bg-gray-200 active:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                            >
                                <svg
                                    class="w-6 h-6 text-gray-500"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                                    />
                                </svg>
                            </button>

                            <div
                                v-if="isNotificationOpen"
                                v-on-click-outside="closeNotification"
                                class="absolute z-50 w-48 max-w-md mt-3 transform bg-white rounded-md shadow-lg -translate-x-3/4 min-w-max"
                            >
                                <div class="p-4 font-medium border-b">
                                    <span class="text-gray-800"
                                        >Notification</span
                                    >
                                </div>
                                <ul class="flex flex-col p-2 my-2 space-y-1">
                                    <li>
                                        <a
                                            href="#"
                                            class="block px-2 py-1 transition rounded-md hover:bg-gray-100"
                                            >Profile</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            href="#"
                                            class="block px-2 py-1 transition rounded-md hover:bg-gray-100"
                                            >Another Link</a
                                        >
                                    </li>
                                </ul>
                                <div
                                    class="flex items-center justify-center p-4 text-blue-700 underline border-t"
                                >
                                    <a href="#">See All</a>
                                </div>
                            </div>
                        </div>
                        <!-- User Menu -->
                        <div class="hidden sm:block">
                            <button
                                @click="isUserMenuOpen = true"
                                class="p-1 bg-gray-200 rounded-full hover:bg-gray-200 focus:bg-gray-200 active:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
                            >
                                <img
                                    class="object-cover w-8 h-8 rounded-full"
                                    src="https://avatars0.githubusercontent.com/u/57622665?s=460&u=8f581f4c4acd4c18c33a87b3e6476112325e8b38&v=4"
                                    alt="Ahmed Kamel"
                                />
                            </button>
                            <!-- green dot -->
                            <div
                                class="absolute right-0 p-1 bg-green-400 rounded-full bottom-3 animate-ping"
                            ></div>
                            <div
                                class="absolute right-0 p-1 bg-green-400 border border-white rounded-full bottom-3"
                            ></div>

                            <div
                                v-if="isUserMenuOpen"
                                v-on-click-outside="closeUserMenu"
                                class="absolute z-50 w-48 max-w-md mt-3 transform bg-white rounded-md shadow-lg -translate-x-3/4 min-w-max"
                            >
                                <div
                                    class="flex flex-col p-4 space-y-1 font-medium border-b"
                                >
                                    <span class="text-gray-800">{{
                                        $page.props.auth.user.name
                                    }}</span>
                                    <span class="text-sm text-gray-400">{{
                                        $page.props.auth.user.email
                                    }}</span>
                                </div>
                                <ul class="flex flex-col p-2 my-2 space-y-1">
                                    <li>
                                        <a
                                            href="#"
                                            class="block px-2 py-1 transition rounded-md hover:bg-gray-100"
                                            >Link</a
                                        >
                                    </li>
                                    <li>
                                        <a
                                            href="#"
                                            class="block px-2 py-1 transition rounded-md hover:bg-gray-100"
                                            >Another Link</a
                                        >
                                    </li>
                                </ul>
                                <div
                                    class="flex items-center justify-center p-4 text-blue-700 underline border-t"
                                >
                                    <Link
                                        :href="route('logout')"
                                        method="post"
                                        as="button"
                                        >Logout</Link
                                    >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main content -->
            <main
                class="flex-1 max-h-full p-5 overflow-hidden overflow-y-scroll"
            >
                <slot />
            </main>
            <!-- Main footer -->
            <footer
                class="flex items-center justify-between flex-shrink-0 p-4 border-t max-h-14"
            >
                <div>&copy; C-ONE CONNECT | 2023</div>
                <div class="text-sm">
                    Made by
                    <a
                        class="text-blue-400 underline"
                        href="https://github.com/Kamona-WD"
                        target="_blank"
                        rel="noopener noreferrer"
                        >ny.ja</a
                    >
                </div>
                <div>
                    <!-- Github svg -->
                    <a
                        href="#"
                        target="_blank"
                        class="flex items-center space-x-1"
                    >
                        <svg
                            class="w-6 h-6 text-gray-400"
                            viewBox="0 0 16 16"
                            fill="currentColor"
                            aria-hidden="true"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"
                            ></path>
                        </svg>
                        <span class="hidden text-sm md:block"
                            >View on Github</span
                        >
                    </a>
                </div>
            </footer>
        </div>
    </div>
</template>
