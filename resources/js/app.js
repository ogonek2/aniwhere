import './bootstrap';
import { createApp } from 'vue';
import App from './components/App.vue';
import SpritePage from './components/SpritePage.vue';

// Check if we're on sprite page
const spritePageEl = document.getElementById('sprite-page');
if (spritePageEl) {
    // Mount sprite page
    createApp(SpritePage).mount('#sprite-page');
} else {
    // Mount main app
    const app = createApp(App);
    app.mount('#app');
}
