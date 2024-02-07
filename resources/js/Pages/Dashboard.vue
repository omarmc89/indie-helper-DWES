<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import PaintingForm from '@/Pages/Artworks/PaintingForm.vue'
import PhotoForm from '@/Pages/Artworks/PhotoForm.vue'


</script>

<template>
    <AppLayout title="Dashboard">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="max-w-xl py-10 px-5 m-auto w-full mt-10">
                        <PaintingForm />
                    </div>
                    <div class="max-w-xl py-10 px-5 m-auto w-full mt-10">
                        <PhotoForm class="" />
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
