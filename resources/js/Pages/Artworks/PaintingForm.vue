<script setup>
import { useForm } from '@inertiajs/vue3';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';

const paintingForm = useForm({
  title:'',
  desciption:'',
  image_url:'',
  style:'',
  width:'',
  height:'',
})

</script>

<!-- FORMULARIO PARA PAINTINGS-->
<template>
        <form @submit.prevent="paintingForm.post('/paintings')">
          <div>
            <InputLabel for="title" value="title" />
            <TextInput
                id="title"
                v-model="paintingForm.title"
                type="text"
                class="mt-1 block w-full"
                required
                autofocus
                autocomplete="title"
            />
            <InputError class="mt-2" :message="paintingForm.errors.title" />
          </div>

          <div class="mt-4">
            <InputLabel for="description" value="description" />
            <TextInput
                id="description"
                v-model="paintingForm.description"
                type="text"
                class="mt-1 block w-full"
                required
                autofocus
                autocomplete="description"
            />
            <InputError class="mt-2" :message="paintingForm.errors.description" />
          </div>

          <div class="mt-4">
            <InputLabel for="image_url" value="Email" />
            <TextInput
                id="image_url"
                v-model="paintingForm.image_url"
                type="text"
                class="mt-1 block w-full"
                required
                autocomplete="username"
            />
            <InputError class="mt-2" :message="paintingForm.errors.image_url" />
          </div>

          <div class="mt-4">
            <InputLabel for="style" value="style" />
            <TextInput
                id="style"
                v-model="paintingForm.style"
                type="text"
                class="mt-1 block w-full"
                required
                autocomplete="new-style"
            />
            <InputError class="mt-2" :message="paintingForm.errors.style" />
          </div>
          <div class="mt-4">
            <InputLabel for="width" value="width" />
            <TextInput
                id="width"
                v-model="paintingForm.width"
                type="number"
                class="mt-1 block w-full"
                required
                autofocus
                autocomplete="width"
            />
            <InputError class="mt-2" :message="paintingForm.errors.width" />
          </div>
          <div class="mt-4">
            <InputLabel for="height" value="height" />
            <TextInput
                id="height"
                v-model="paintingForm.height"
                type="number"
                class="mt-1 block w-full"
                required
                autofocus
                autocomplete="height"
            />
            <InputError class="mt-2" :message="paintingForm.errors.height" />
          </div>

          <div class="flex items-center justify-end mt-4">
            <PrimaryButton class="ms-4" :class="{ 'opacity-25': paintingForm.processing }" :disabled="paintingForm.processing">
                Create Painting
            </PrimaryButton>
          </div>
        </form>
</template>