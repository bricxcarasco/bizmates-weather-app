// import './bootstrap';
import { createApp  } from 'vue';
import router from './router/index';
import Index from './Index.vue';

const app = createApp(Index);

app.use(router);
app.mount('#app')