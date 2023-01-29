<template>
  <header class="sticky top-0 bg-weather-primary shadow-lg">
    <nav class="container flex flex-col sm:flex-row items-center gap-4 text-white py-6">
      <RouterLink :to="{ name: 'main' }">
          <div class="flex items-center gap-3">
              <i class="fa-solid fa-sun text-2xl"></i>
              <p class="text-2xl">
                Bizmates Weather App
              </p>
          </div>
      </RouterLink>

      <div class="flex gap-3 flex-1 justify-end">
        <i
          @click="toggleModal"
          class="fa-solid fa-circle-info text-xl hover:text-weather-secondary duration-150 cursor-pointer"
        ></i>
      </div>

      <WeatherInfoModal
        :modalActive="modalActive"
        @close-modal="toggleModal"
      />
    </nav>
  </header>
</template>

<script setup>
  import { ref } from 'vue';
  import { RouterLink } from 'vue-router';
  import WeatherInfoModal from '../modals/WeatherInfoModal.vue';

  const modalActive = ref(false);

  /**
   * Toggle weather information modal
   *
   * @returns {void}
   */
  const toggleModal = () => {
    modalActive.value = !modalActive.value;
  }
</script>