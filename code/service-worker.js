var dataCacheName = 'ΣΔΥ51-Senior Care';
var cacheName = 'ΣΔΥ51-Senior Care';
var filesToCache = [
'/',
"./bootstrap-datetimepicker-master",
"./css",
"./fonts",
"./images",
"./bootstrap-datetimepicker-master/bootstrap-datetimepicker.css",
"./bootstrap-datetimepicker-master/bootstrap-datetimepicker.min.js",
"./bootstrap-datetimepicker-master/el.js",
"./css/bootstrap.min.css",
"./css/bootstrap.min.css.map",
"./css/bootstrap.min.js",
"./css/rh.css",
"./css/rh6.css",
"./fonts/glyphicons-halflings-regular.eot",
"./fonts/glyphicons-halflings-regular.svg",
"./fonts/glyphicons-halflings-regular.ttf",
"./fonts/glyphicons-halflings-regular.woff",
"./fonts/glyphicons-halflings-regular.woff2",
"./images/favicon",
"./images/seniorcare-logo.png",
"./images/favicon/apple-touch-icon-114x114.png",
"./images/favicon/apple-touch-icon-120x120.png",
"./images/favicon/apple-touch-icon-144x144.png",
"./images/favicon/apple-touch-icon-152x152.png",
"./images/favicon/apple-touch-icon-192x192.png",
"./images/favicon/apple-touch-icon-384x384.png",
"./images/favicon/apple-touch-icon-512x512.png",
"./images/favicon/apple-touch-icon-57x57.png",
"./images/favicon/apple-touch-icon-60x60.png",
"./images/favicon/apple-touch-icon-72x72.png",
"./images/favicon/apple-touch-icon-76x76.png",
"./images/favicon/favicon-128.png",
"./images/favicon/favicon-16x16.png",
"./images/favicon/favicon-196x196.png",
"./images/favicon/favicon-32x32.png",
"./images/favicon/favicon-96x96.png",
"./images/favicon/favicon.ico",
"./images/favicon/mstile-144x144.png",
"./images/favicon/mstile-150x150.png",
"./images/favicon/mstile-310x150.png",
"./images/favicon/mstile-310x310.png",
"./images/favicon/mstile-70x70.png",
"./weather_f/geolocation.js",
"./weather_f/main.css",
"./weather_f/main.js",
"./weather_f/ui.js",
"./weather_f/weather.js"
];

self.addEventListener('install', function(e) {
  console.log('[ServiceWorker] Install');
  e.waitUntil(
    caches.open(cacheName).then(function(cache) {
      console.log('[ServiceWorker] Caching app shell');
      return cache.addAll(filesToCache);
    })
  );
});

self.addEventListener('activate', function(e) {
  console.log('[ServiceWorker] Activate');
  e.waitUntil(
    caches.keys().then(function(keyList) {
      return Promise.all(keyList.map(function(key) {
        if (key !== cacheName && key !== dataCacheName) {
          console.log('[ServiceWorker] Removing old cache', key);
          return caches.delete(key);
        }
      }));
    })
  );
  return self.clients.claim();
});

self.addEventListener('fetch', function(e) {
  console.log('[Service Worker] Fetch', e.request.url);
  e.respondWith(
    caches.match(e.request).then(function(response) {
      return response || fetch(e.request);
    })
  );
});
