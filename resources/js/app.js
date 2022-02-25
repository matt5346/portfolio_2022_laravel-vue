import { createApp } from 'vue';
import AppView from './App.vue';
import router from './router';
import i18n from './i18n';
import store from './store';

window.axios = require('axios');
const app = createApp(AppView);

app.use(store);
app.use(router);
app.use(i18n);

app.mount('#app');
