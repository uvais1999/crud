<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3'
import InputError from '@/Components/InputError.vue';

const props = defineProps({
    permissions: Object,
});

const form = useForm({
    id: props.permissions ? props.permissions.id : '',
    name: '',
    selected_permissions: [],
})

function submit() {
    if (!props.role) {
        form.post(route('user-roles.store'), {
            preserveScroll: true,
            onSuccess: () => form.reset(),
        })
    } else {
        form.put(route('user-roles.update', form.id), {
            preserveScroll: true,
            onSuccess: () => form.reset(),
        })
    }
}
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight"> Product</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">


                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">



                        <div class="max-w-md mx-auto">
                            <h1 class="my-5">{{ product ? 'Edit' : 'Add' }} Role</h1>
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" v-model="form.name"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " />
                                <label for="floating_email"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Enter
                                    name</label>
                                <InputError class="mt-2" :message="form.errors.name" />

                                <div class="mt-5">
                                    <div class="flex items-center mb-4" v-for="permission in permissions">
                                        <input id="default-checkbox" type="checkbox" v-model="form.selected_permissions" :value="permission.name"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="default-checkbox"
                                            class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ permission.name }}</label>
                                    </div>
                                </div>
                            </div>

                            <button @click="submit()"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </AuthenticatedLayout></template>
