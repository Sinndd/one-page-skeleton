/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app_styles.css';

// Import Vue (Vue 3)
import { createApp } from 'vue';

// Import your component
// import Example from '../public/assets/components/Example.vue';

/**
* Create a fresh Vue 3 Application instance
*/
const app = createApp({});

// Register your component
// app.component('Example', Example);

// Mount the app to the DOM element with the ID 'app'
app.mount('#app');
