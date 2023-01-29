# **Bizmates Weather App**

## Technology used:
 - PHP 8
 - Laravel 9
 - Vue 3
 -  Tailwind CSS

## Installation
To run Bizmates Weather App on local machine follow these instructions:

1.  Clone the repository and go to the root folder of the project.
2.  Create `.env` file and copy variables from `.env.example` to `.env`.
3.  Run `composer install` to install PHP dependencies.
4.  Run `npm install` to install Javascript packages.
5.  Run `php artisan serve`.
6.  Access the site in [http://127.0.0.1:8000/](http://127.0.0.1:8000/) url

  
# Bizmates Weather App Features

## Backend

- Used API routes since there is no blade file used for developmentexcept the base template.
- Used separate folder for API’s using /app/Http/Controllers/Api directory.
- Used Form Request for validating request data from client with separate folder per category. e.g (app/Http/Requests/FourSquare/GeoLocationRequest.php)
- Used Api Resources to only get the data needed for the project. e.g (app/Http/Resources/FourSquare/GeoLocationResource.php)
- Used PHP Doc Block that allows to easily document your code via specially formatted comments.
- Use config variables instead directly calling env variables to the controllers for maintainability. e.g (config/api_base_urls.php)
- Used folder based directories, though it is not applicable for this simple project but just want to expose the possibilities if the project become bigger for maintainability and better understanding.
- Implements PSR-2/PSR-12

## Frontend

- Used and setup TailwindCSS and implement global css styles like screen sizes, fonts, colors and etc.
- Used Javascript Doc Block that allows to easily document your code via specially formatted comments.
- Used folder based directories, though it is not applicable for this simple project but just want to expose the possibilities if the project become bigger for maintainability and better understanding.
- Created separate barebones for calling backend API’s instead of calling it directly in the components. e.g (resources/js/api/foursquare/index.js)
- Separated components directories like modals, common components and sub components for maintainability purposes and easy to understand.
- Use the the latest Vue3 with script setup feature, with Vue Router to implement SPA though it is not applicable to this project.
- Use Transition function for animations of modal. e.g (resources/js/components/modals/BaseModal.vue)
- Use Teleport function for styles issues that can encountered if the project becomes bigger. e.g (resources/js/components/modals/BaseModal.vue)
- Implemented Google Javascript, HTML and CSS Style Guide and ES6