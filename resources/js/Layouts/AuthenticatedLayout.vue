<script setup>
import { onMounted, ref } from 'vue';
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';
import { Link } from '@inertiajs/vue3';
import Menu from '@/Layouts/Menu.vue';
import Header from '@/Layouts/Header.vue';
import { initFlowbite } from 'flowbite';

onMounted(() => {
    initFlowbite();
})

</script>

<template>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <Header />

        <!-- Sidebar -->

        <Menu />

        <main class="p-4 md:ml-64 h-auto pt-20">
            <slot />
        </main>
    </div>
</template>
