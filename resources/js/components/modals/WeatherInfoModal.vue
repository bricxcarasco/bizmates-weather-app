<template>
	<base-modal
		@close-modal="$emit('close-modal')"
	>
		<div class="text-black">
			<div class="flex flex-1 justify-end">
        <i
					@click="$emit('close-modal')"
          class="fa-solid fa-close text-xl hover:text-weather-secondary duration-150 cursor-pointer"
        ></i>
      </div>

			<div class="flex items-center gap-3">
				<h1 class="text-2xl font-bold mb-1">
					Bizmates Weather App Technical Features
				</h1>
			</div>

			<hr class="my-6 border-1 border-gray-300">

			<h2 class="text-2xl pb-4">Backend</h2>
			<ul class="space-y-4">
				<li
					v-for="feature in backendFeatures"
					:key="feature"
					class="flex items-center"
				>
					<svg class="h-6 w-6 flex-none fill-sky-100 stroke-sky-500 stroke-2" stroke-linecap="round" stroke-linejoin="round">
						<circle cx="12" cy="12" r="11" />
						<path d="m8 13 2.165 2.165a1 1 0 0 0 1.521-.126L16 9" fill="none" />
					</svg>
					<p class="ml-4">
						{{ feature }}
					</p>
				</li>
			</ul>

			<hr class="my-6 border-1 border-gray-300">

			<h2 class="text-2xl pb-4">Frontend</h2>
			<ul class="space-y-4">
				<li
					v-for="feature in frontendFeatures"
					:key="feature"
					class="flex items-center"
				>
					<svg class="h-6 w-6 flex-none fill-sky-100 stroke-sky-500 stroke-2" stroke-linecap="round" stroke-linejoin="round">
						<circle cx="12" cy="12" r="11" />
						<path d="m8 13 2.165 2.165a1 1 0 0 0 1.521-.126L16 9" fill="none" />
					</svg>
					<p class="ml-4">
						{{ feature }}
					</p>
				</li>
			</ul>
		</div>
	</base-modal>
</template>

<script setup>
	import BaseModal from "./BaseModal.vue";

	defineEmits(["close-modal"]);

	const backendFeatures = [
		"Used API routes since there is no blade file used for development except the base template.",
		"Used separate folder for API’s using /app/Http/Controllers/Api directory.",
		"Used Form Request for validating request data from client with separate folder per category. e.g (app/Http/Requests/FourSquare/GeoLocationRequest.php)",
		"Used Api Resources to only get the data needed for the project. e.g (app/Http/Resources/FourSquare/GeoLocationResource.php)",
		"Used PHP Doc Block that allows to easily document your code via specially formatted comments.",
		"Use config variables instead directly calling env variables to the controllers for maintainability. e.g (config/api_base_urls.php)",
		"Used folder based directories, though it is not applicable for this simple project but just want to expose the possibilities if the project become bigger for maintainability and better understanding.",
		"Implements PSR-2/PSR-12"
	];

	const frontendFeatures = [
    "Used and setup TailwindCSS and implement global css styles like screen sizes, fonts, colors and etc.",
    "Used Javascript Doc Block that allows to easily document your code via specially formatted comments.",
    "Used folder based directories, though it is not applicable for this simple project but just want to expose the possibilities if the project become bigger for maintainability and better understanding.",
    "Created separate barebones for calling backend API’s instead of calling it directly in the components. e.g (resources/js/api/foursquare/index.js)",
    "Separated components directories like modals, common components and sub components for maintainability purposes and easy to understand.",
    "Use the the latest Vue3 with script setup feature, with Vue Router to implement SPA though it is not applicable to this project.",
    "Use Transition function for animations of modal. e.g (resources/js/components/modals/BaseModal.vue)",
    "Use Teleport function for styles issues that can encountered if the project becomes bigger. e.g (resources/js/components/modals/BaseModal.vue)",
    "Implemented Google Javascript, HTML and CSS Style Guide and ES6."
	];
</script>
