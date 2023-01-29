<template>
  <div
		class="flex flex-col flex-1 items-center"
	>
    <div class="flex flex-col items-center text-white py-12">
      <h1 class="text-4xl mb-4 text-sky-400">
        {{ weatherData.name }}
      </h1>
      <p class="text-xs text-black">
        Weather information last updated at:
      </p>
      <p class="text-sm mb-12">
        {{
          new Date(weatherData.timestamp * 1000)
            .toLocaleDateString(
              "ja-JP",
              {
                weekday: "short",
                day: "2-digit",
                month: "long",
                year: "numeric",
              }
            )
        }}
        {{
          new Date(weatherData.timestamp * 1000)
            .toLocaleTimeString(
              "ja-JP",
              {
                hour: "2-digit",
                minute: "2-digit",
                hour12: true
              }
            )
        }}
      </p>
      <p class="text-8xl mb-8 text-yellow-400">
        {{ Math.round(weatherData.temperature) }}&deg;
      </p>
      <p>
        Feels like
        <span class="text-sky-400">
          {{ Math.round(weatherData.feels_like) }} &deg;
        </span>
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