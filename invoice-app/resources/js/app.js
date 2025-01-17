import { createApp } from 'vue';
import App from './components/app.vue';
import router from './router'; // Importing from ./router/index.js

const app = createApp(App);

app.use(router);

app.mount('#app');
