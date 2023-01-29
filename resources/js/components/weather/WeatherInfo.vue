<template>
  <div
		class="flex flex-col flex-1 items-center"
	>
    <div class="flex flex-col items-center text-white py-12">
      <h1 class="text-4xl mb-2">{{ weatherData.name }}</h1>
      <p class="text-sm mb-12">
        {{
          new Date(weatherData.timestamp).toLocaleDateString(
            "ja-JP",
            {
              weekday: "short",
              day: "2-digit",
              month: "long",
            }
          )
        }}
        {{
          new Date(weatherData.timestamp).toLocaleTimeString(
            "ja-JP",
            {
              timeStyle: "short",
            }
          )
        }}
      </p>
      <p class="text-8xl mb-8">
        {{ Math.round(weatherData.temperature) }}&deg;
      </p>
      <p>
        Feels like
        {{ Math.round(weatherData.feels_like) }} &deg;
      </p>
      <p class="capitalize">
        {{ weatherData.description }}
      </p>
      <img
        class="w-[150px] h-auto"
        :src="
          `http://openweathermap.org/img/wn/${weatherData.icon}@2x.png`
        "
        alt=""
      />
    </div>
	</div>
</template>

<script setup>
	defineProps({
		weatherData: {
			type: Object,
			default: {}
		}
	});
</script>