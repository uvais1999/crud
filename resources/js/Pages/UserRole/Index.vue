<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3'
import { router } from '@inertiajs/vue3'

const props = defineProps({
    roles: Object,
});

function add() {
    router.visit(route('user-roles.create'))
}

// function edit(data) {
//     router.visit(route('roles.edit', data))
// }

// function deleteData(data) {
//     if (confirm("Do you really want to delete?")) {
//         router.delete(route('roles.destroy', data))
//     }
// }
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">User Roles</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <div class="flex justify-between my-2">
                            <div>User Roles</div>
                            <button type="button" @click="add()"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Add
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </button>
                        </div>
                        <table
                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-[10px]">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-200 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700"
                                    v-for="role in roles">
                                    <th scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ role.name }}
                                    </th>
                                    <td class="px-6 py-4">
                                        <!-- soon -->
                                        <!-- <button @click="edit(role)"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</button>
                                        <button @click="deleteData(role)"
                                            class="ms-2 font-medium text-blue-600 dark:text-blue-500 hover:underline">Delete</button> -->
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
