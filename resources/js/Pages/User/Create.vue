<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3'
import InputError from '@/Components/InputError.vue';

const props = defineProps({
    roles: Object,
});

const form = useForm({
    name: '',
    email: '',
    password: '',
    role: '',
    confirm_password : '',
})

function submit() {
    // if (!props.role) {
        form.post(route('users.store'), {
            preserveScroll: true,
            onSuccess: () => form.reset(),
        })
    // } else {
    //     form.put(route('users.update', form.id), {
    //         preserveScroll: true,
    //         onSuccess: () => form.reset(),
    //     })
    // }
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
                            <h1 class="my-5">Add User</h1>
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" v-model="form.name"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " />
                                <label for="floating_email"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Enter
                                    name</label>
                                <InputError class="mt-2" :message="form.errors.name" />
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="text" v-model="form.email"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " />
                                <label for="floating_email"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Enter
                                    email</label>
                                <InputError class="mt-2" :message="form.errors.email" />
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="password" v-model="form.password"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " />
                                <label for="floating_email"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Enter
                                    password</label>
                                <InputError class="mt-2" :message="form.errors.password" />
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <input type="password" v-model="form.confirm_password"
                                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder=" " />
                                <label for="floating_email"
                                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Enter
                                    password</label>
                                <InputError class="mt-2" :message="form.errors.confirm_password" />
                            </div>
                            <div class="relative z-0 w-full mb-5 group">
                                <label for="countries"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an
                                    option</label>
                                <select id="countries" v-model="form.role"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option :value="role.name" v-for="role in roles">{{ role.name }}</option>
                                </select>
                                <InputError class="mt-2" :message="form.errors.email" />
                            </div>

                            <button @click="submit()"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </div>

                    </div>

                </div>
            </div>
        </div>
</AuthenticatedLayout></template>
