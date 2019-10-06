var cacheName = 'escon-page';
var filesToCache = [
  '/',
  '/inicio.html',
  '/index.html',
  '/vendor/fontawesome-free/css/all.min.css',
  '/css/sb-admin.css',
  '/vendor/datatables/dataTables.bootstrap4.css',
  '/offline/index.html'

];
self.addEventListener('install', function(event) {
  console.log('[ServiceWorker] Install');
  event.waitUntil(
    caches.open(cacheName).then(function(cache) {
      console.log('[ServiceWorker] Caching app shell');
      return cache.addAll(filesToCache);
    })
  );
});
self.addEventListener('activate',  event => {
  event.waitUntil(self.clients.claim());
});
/**self.addEventListener('fetch', event => {
  event.respondWith(
    caches.match(event.request, {ignoreSearch:true}).then(response => {
      return response || fetch(event.request);
    })
    .catch(() => {
      return caches.match('/offline/index.html');
  ))
});**/
// Serve from Cache
self.addEventListener("fetch", event => {
  event.respondWith(
    caches.match(event.request)
      .then(response => {
        return response || fetch(event.request);
      })
      .catch(() => {
        return caches.match('/offline/index.html');
      })
  )
});