<script setup>

defineProps({
    artworks: Object,
});

let baseImage = "https://picsum.photos/200/300?random=";

</script>

<template>

    <div class="bg-gradient-to-r from-blue-800 to-blue-400 min-h-screen p-8">
        <div class="max-w-2xl mx-auto">
        <h1 class="text-3xl font-semibold text-white mb-6">Artworks</h1>

        <ul class="grid grid-cols-1 md:grid-cols-2  gap-4">
            <li class="bg-white p-6 rounded-lg shadow-md flex" v-for="libro in libros" :key="libro.id">
            <div class="flex-shrink-0">
                <img class="w-24 h-36 object-cover rounded" :src="`${baseImage}${libro.id}`" alt="Portada del Llibre">
            </div>
            <div class="ml-4">
                <h2 class="text-xl font-semibold mb-2">{{ libro.titulo }}</h2>
                <p class="text-blue-700">{{ libro.editorial }}</p>
                <p class="text-blue-700 font-semibold">{{ libro.precio }} €</p>
            </div>
            </li>
        </ul>
        </div>
    </div>

</template>