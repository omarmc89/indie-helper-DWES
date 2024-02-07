<script setup>
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';


const photoForm = useForm({
  title:'',
  description:'',
  image_url:'',
  style:''
})

</script>

<!-- FORMULARIO PARA ARTISTS-->
<template>
        <form @submit.prevent="photoForm.post('/photos')">
          <div>
            <InputLabel for="title" value="Title" />
            <TextInput
                id="title"
                v-model="photoForm.title"
                type="text"
                class="mt-1 block w-full"
                required
                autofocus
                autocomplete="title"
            />
            <InputError class="mt-2" :message="photoForm.errors.title" />
          </div>

          <div class="mt-4">
            <InputLabel for="description" value="Description" />
            <TextInput
                id="description"
                v-model="photoForm.description"
                type="text"
                class="mt-1 block w-full"
                required
                autofocus
                autocomplete="description"
            />
            <InputError class="mt-2" :message="photoForm.errors.description" />
          </div>

          <div class="mt-4">
            <InputLabel for="image_url" value="Url image" />
            <TextInput
                id="image_url"
                v-model="photoForm.image_url"
                type="text"
                class="mt-1 block w-full"
                required
                autocomplete="username"
            />
            <InputError class="mt-2" :message="photoForm.errors.image_url" />
          </div>

          <div class="mt-4">
            <InputLabel for="style" value="Style" />
            <TextInput
                id="style"
                v-model="photoForm.style"
                type="text"
                class="mt-1 block w-full"
                required
                autocomplete="new-style"
            />
            <InputError class="mt-2" :message="photoForm.errors.style" />
          </div>
          <div class="flex items-center justify-end mt-4">
            <PrimaryButton class="ms-4" :class="{ 'opacity-25': photoForm.processing }" :disabled="photoForm.processing">
                Create Photo
            </PrimaryButton>
          </div>
        </form>
</template>