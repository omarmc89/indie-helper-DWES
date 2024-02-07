<script setup>
import { Head, Link, useForm } from '@inertiajs/vue3';
import { ref } from 'vue';
import AuthenticationCard from '@/Components/AuthenticationCard.vue';
import InputError from '@/Components/InputError.vue';
import InputLabel from '@/Components/InputLabel.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import TextInput from '@/Components/TextInput.vue';
import Header from '@/Components/Header.vue';

const artistForm = useForm({
      name:'',
      email:'',
      password: '',
      confirmPassword:'',
      nickname:''
  })

  const organiserForm = useForm({
      name:'',
      email:'',
      password: '',
      location:'',
      confirmPassword:'',
      enterprise:''
  })
  
  const artist = ref(true);
  const organiser = ref(false);

  function artistFormHidden () {
    organiser.value = false
    artist.value = !artist.value   
  }

  function organiserFormHidden () {
    artist.value = false
    organiser.value = !organiser.value  
  }

</script>

<template>
  <Head title="Register" />
    <Header />
    <AuthenticationCard>
      <template #logo>
        <div>
            <h2 class="text-xl text-center font-bold tracking-wide uppercase">Select type of user:</h2>
        </div>
        <section class="flex flex-row justify-center items-center p-4 bg-gray-100 dark:bg-gray-900">
          <button :disabled="artist" :class="{active:artist}" @click="artistFormHidden(artist)" class="button relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
            <span class="text-lg tracking-wide relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
              Artist
            </span>
          </button>
          <button :disabled="organiser" @click="organiserFormHidden(organiser)" class="button relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-purple-600 to-blue-500 group-hover:from-purple-600 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800">
            <span class="text-lg tracking-wide relative px-5 py-2.5 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
              Organiser
            </span>
          </button>
        </section>
      </template>

<!-- FORMULARIO PARA ARTISTS-->

        <form v-if="artist" @submit.prevent="artistForm.post('/artists')">
          <h2 class="text-3xl text-center text-teal-600 p-3 font-black tracking-wide">ARTIST</h2>
          <div>
            <InputLabel for="name" value="Name" />
            <TextInput
                id="name"
                v-model="artistForm.name"
                type="text"
                class="mt-1 block w-full"
                required
                autofocus
                autocomplete="name"
            />
            <InputError class="mt-2" :message="artistForm.errors.name" />
          </div>

          <div class="mt-4">
            <InputLabel for="nickname" value="Nickname" />
            <TextInput
                id="nickname"
                v-model="artistForm.nickname"
                type="text"
                class="mt-1 block w-full"
                required
                autofocus
                autocomplete="nickname"
            />
            <InputError class="mt-2" :message="artistForm.errors.nickname" />
          </div>

          <div class="mt-4">
            <InputLabel for="email" value="Email" />
            <TextInput
                id="email"
                v-model="artistForm.email"
                type="email"
                class="mt-1 block w-full"
                required
                autocomplete="username"
            />
            <InputError class="mt-2" :message="artistForm.errors.email" />
          </div>

          <div class="mt-4">
            <InputLabel for="password" value="Password" />
            <TextInput
                id="password"
                v-model="artistForm.password"
                type="password"
                class="mt-1 block w-full"
                required
                autocomplete="new-password"
            />
            <InputError class="mt-2" :message="artistForm.errors.password" />
          </div>

          <div class="mt-4">
            <InputLabel for="confirmPassword" value="Confirm Password" />
            <TextInput
                id="confirmPassword"
                v-model="artistForm.confirmPassword"
                type="password"
                class="mt-1 block w-full"
                required
                autocomplete="new-password"
            />
            <InputError class="mt-2" :message="artistForm.errors.confirmPassword" />
          </div>
          <div class="flex items-center justify-end mt-4">
            <Link :href="route('login')" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                Already registered?
            </Link>

            <PrimaryButton class="ms-4" :class="{ 'opacity-25': artistForm.processing }" :disabled="artistForm.processing">
                Register Artist
            </PrimaryButton>
          </div>
        </form>

<!-- FORMULARIO PARA ORGANISERS-->

        <form v-if="organiser" @submit.prevent="organiserForm.post('/organisers')">
          <h2 class="text-3xl text-center text-teal-600 p-3 font-black tracking-wide">ORGANISER</h2>
          <div>
            <InputLabel for="name" value="Name" />
            <TextInput
                id="name"
                v-model="organiserForm.name"
                type="text"
                class="mt-1 block w-full"
                required
                autofocus
                autocomplete="name"
            />
            <InputError class="mt-2" :message="organiserForm.errors.name" />
          </div>

          <div class="mt-4">
            <InputLabel for="email" value="Email" />
            <TextInput
                id="email"
                v-model="organiserForm.email"
                type="email"
                class="mt-1 block w-full"
                required
                autocomplete="username"
            />
            <InputError class="mt-2" :message="organiserForm.errors.email" />
          </div>

          <div class="mt-4">
            <InputLabel for="password" value="Password" />
            <TextInput
                id="password"
                v-model="organiserForm.password"
                type="password"
                class="mt-1 block w-full"
                required
                autocomplete="new-password"
            />
            <InputError class="mt-2" :message="organiserForm.errors.password" />
          </div>

          <div class="mt-4">
            <InputLabel for="confirmPassword" value="Confirm Password" />
            <TextInput
                id="confirmPassword"
                v-model="organiserForm.confirmPassword"
                type="password"
                class="mt-1 block w-full"
                required
                autocomplete="new-password"
            />
            <InputError class="mt-2" :message="organiserForm.errors.confirmPassword" />
          </div>
          <div class="mt-4">
            <InputLabel for="location" value="Location" />
            <TextInput
                id="location"
                v-model="organiserForm.location"
                type="text"
                class="mt-1 block w-full"
                required
                autofocus
                autocomplete="location"
            />
            <InputError class="mt-2" :message="organiserForm.errors.location" />
          </div>
          <div class="mt-4">
            <InputLabel for="enterprise" value="Enterprise" />
            <TextInput
                id="enterprise"
                v-model="organiserForm.enterprise"
                type="text"
                class="mt-1 block w-full"
                required
                autofocus
                autocomplete="enterprise"
            />
            <InputError class="mt-2" :message="organiserForm.errors.enterprise" />
          </div>

          <div class="flex items-center justify-end mt-4">
            <Link :href="route('login')" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                Already registered?
            </Link>

            <PrimaryButton class="ms-4" :class="{ 'opacity-25': organiserForm.processing }" :disabled="organiserForm.processing">
                Register Organiser
            </PrimaryButton>
          </div>
        </form>
    </AuthenticationCard>
</template>

<style>

.button:disabled{
  pointer-events: none;
  color:grey;
  opacity: 0.5;
}

</style>