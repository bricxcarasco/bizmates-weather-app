<template>
  <main class="container text-black">
    <div class="pt-4 mb-8 relative">
      <div class="relative rounded-md shadow-sm">
        <select
          ref="selectCityRef"
          class="form-input py-2 px-3 block w-full leading-5 rounded-md transition duration-150 ease-in-out bg-white border border-gray-300 appearance-none focus:outline-none focus:shadow-outline-blue focus:border-blue-300"
          v-model="selectedCity"
          @change="selectCity"
        >
          <option
            v-for="city in cities"
            :key="city"
            :value="city"
          >
            {{ city }}
          </option>
        </select>
        <div
          class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
        >
          <svg
            class="fill-current h-4 w-4"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
          >
            <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/>
          </svg>
        </div>
      </div>
    </div>
    <div
      v-if="weatherData"
    >
      <WeatherInfo
        :weatherData="weatherData"
      />
    </div>
  </main>
</template>

<script setup>
  import { ref } from "vue";
  import FourSquareApiService from "../api/foursquare/index";
  import OpenWeatherApiService from "../api/openweather/index";

  import WeatherInfo from '../components/weather/WeatherInfo.vue';

  const fourSquareApiService = new FourSquareApiService();
  const openWeatherApiService = new OpenWeatherApiService();

  const cities = ref([
      "Tokyo",
      "Yokohama",
      "Kyoto",
      "Osaka",
      "Sapporo",
      "Nagoya",
  ]);

  const selectCityRef = ref(null);
  const selectedCity = ref("");
  const selectedCityData = ref({});
  const weatherData = ref(null);

  /**
   * Get city geo location
   * 
   * @returns {void}
   */
  const searchCityGeoLocation = () => {
    fourSquareApiService
      .searchCityGeoLocation(
        {
          city: selectedCity.value
        }
      )
      .then((response) => {
        selectedCityData.value = {
          latitude: response.data.latitude,
          longitude: response.data.longitude,
        }
        getWeather(selectedCityData.value)
      })
      .catch((error) => {
        console.log(error);
      });
  }

  /**
   * Get weather info of a particular city
   *
   * @param {object} data
   * 
   * @returns {void}
   */
  const getWeather = (data) => {
    openWeatherApiService
      .getWeather(data)
      .then((response) => {
        weatherData.value = response.data;
      })
      .catch((error) => {
        console.log(error);
      });
  }

  /**
   * Set selected city on select dropdown
   *
   * @returns {void}
   */
  const selectCity = () => {
    selectedCity.value = selectCityRef.value.value;
    if (selectedCity.value) {
      searchCityGeoLocation();
    }
  };

  /**
   * Get selected value and put in city select dropdown
   *
   * @returns {void}
   */
  const focusSelect = () => {
    selectCityRef.value.focus();
  };
</script>
