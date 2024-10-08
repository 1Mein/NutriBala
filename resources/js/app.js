import './bootstrap';
import { createApp } from "vue";
import router from "./router";
import App from "./App.vue";

// import 'vuetify/styles'
import { createVuetify } from "vuetify";
import * as components from "vuetify/components";
import * as directives from "vuetify/directives";

const vuetify= createVuetify({components,directives});

createApp(App).use(router,vuetify).mount("#app");
