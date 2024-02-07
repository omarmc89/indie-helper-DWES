
<script setup>
import { Link } from '@inertiajs/vue3'
import ApplicationLogo from '@/Components/ApplicationLogo.vue';
</script>

<template>
    <header class="bg-white dark:bg-gray-800 shadow">      
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <a class="flex flex-row items-center" href="/">
                <ApplicationLogo width="50"/>
                <h1 class="text-6xl tracking-wide font-extrabold ">ArtHub</h1>
            </a>
        </div>        
    </header>
</template>