import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allow your team to quickly build robust real-time web applications.
 */
// import Echo from 'laravel-echo';
 
// window.Pusher = require('pusher-js');
 
// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.PUSHER_APP_KEY,
//     cluster: process.env.PUSHER_APP_CLUSTER,
//     forceTLS: true
// });

import './echo';
