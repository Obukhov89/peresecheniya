import router from "./router";

import ('./bootstrap');

import { createApp } from 'vue'

import App from './App.vue'

createApp(App)
    .use(router)
    .mount("#app")
