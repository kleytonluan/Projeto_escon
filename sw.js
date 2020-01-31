var cacheName = 'escon-cache-';
var version = '0.0.1'
var filesToCache = [
  //'/',
  '/offline/index.html',
  //'/index.html',
  '/vendor/fontawesome-free/css/all.min.css',
  '/css/sb-admin.css',
  '/vendor/datatables/dataTables.bootstrap4.css'

];
self.addEventListener('install', function(event) {
  console.log('[ServiceWorker] Instalado com sucesso!');
  event.waitUntil(
    caches.open(cacheName + version + (1)).then(function(cache) {
      console.log('[ServiceWorker] Criando cache da aplicação...');
      return cache.addAll(filesToCache);
    })
  );
});

self.addEventListener('activate',  event => {
  event.waitUntil( //self.clients.claim()
    caches.keys().then(function(cacheNames) {
      return Promise.all(
        cacheNames.filter(function(cacheName) {
          // Return true if you want to remove this cache,
          // but remember that caches are shared across
          // the whole origin
        }).map(function(cacheName) {
          return caches.delete(cacheName + (version - 1));
        })
      );
    })
  );
});

/**
self.addEventListener('message', function(event) {
  if (event.data.action === 'skipWaiting') {
    self.skipWaiting();
  }
});

/**  Serve from Cache
self.addEventListener("fetch", event => {
  event.respondWith(
   caches.match(event.request)
      .then(response => {
        return response || fetch(event.request);
      })
      .catch(() => {
        alert("Voce esta Offline. Joge esse joguindo até chegar internet. ;D");
        return caches.match('offline/index.html');
      })
  )
});*/

/**
self.addEventListener('fetch', event => {
  // request.mode = navigate isn't supported in all browsers
  // so include a check for Accept: text/html header.
  if (event.request.mode === 'navigate' || (event.request.method === 'GET' && event.request.headers.get('accept').includes('text/html'))) {
        event.respondWith(
          fetch(event.request.url).catch(error => {
              // Return the offline page
              //alert("Voce esta Offline. Joge esse joguindo até chegar internet. ;D", error )
              return caches.match('offline/index.html');

              //return caches.match(offlineUrl);
          })
    );
  }
  else{
        // Respond with everything else if we can
        event.respondWith(caches.match(event.request)
                        .then(function (response) {
                        return response || fetch(event.request);
                    })
            );
      }
});**/

self.addEventListener('fetch', function(event) {
  event.respondWith(
    // Try the cache
    caches.match(event.request).then(function(response) {
      if (response) {
        return response;
      }
      return fetch(event.request).then(function(response) {
        if (response.status === 404) {
          console.log('Você está offline, jogue um joginho enquanto sua conexão é reestabelecida');
          return caches.match('offline/index.html');
        }
        return response
      });
    }).catch(function() {
      // If both fail, show a generic fallback:
      alert('Você está offline, jogue um joginho enquanto sua conexão é reestabelecida');
      return caches.match('offline/index.html');
    })
  );
});



/** 
self.addEventListener('fetch', function(event) {
  event.respondWith(
    caches.match(event.request)
      .then(function(response) {
        // Cache hit - return response
        if (response) {
          return response;
        } else {
          console.log('Voce esta Offline. Joge esse joguindo até chegar internet. ;D');
          return caches.match('offline/index.html');
        }
        
        // IMPORTANT: Clone the request. A request is a stream and
        // can only be consumed once. Since we are consuming this
        // once by cache and once by the browser for fetch, we need
        // to clone the response.
        var fetchRequest = event.request.clone();

        return fetch(fetchRequest).then(
          function(response) {
            // Check if we received a valid response
            if(!response || response.status !== 200 || response.type !== 'basic') {
              return response;
            }

            // IMPORTANT: Clone the response. A response is a stream
            // and because we want the browser to consume the response
            // as well as the cache consuming the response, we need
            // to clone it so we have two streams.
            var responseToCache = response.clone();

            caches.open(cacheName)
              .then(function(cache) {
                cache.put(event.request, responseToCache);
              });

            return response;
          }
        );
      })
    );
});*/

//Push notification 

 /**self.addEventListener('push', function (event) {
  if (event && event.data) {
    const data = event.data.json();
    event.waitUntil(self.registration.showNotification(data.title, {
      body: data.body,
      icon: data.icon || null
    });
  }
});

function messageToClient(client, data) {
  return new Promise(function(resolve, reject) {
    const channel = new MessageChannel();

    channel.port1.onmessage = function(event){
      if (event.data.error) {
        reject(event.data.error);
      } else {
        resolve(event.data);
      }
    };

    client.postMessage(JSON.stringify(data), [channel.port2]);
  });
}

self.addEventListener('push', function (event) {
  if (event && event.data) {
    self.pushData = event.data.json();
    if (self.pushData) {
      event.waitUntil(self.registration.showNotification(self.pushData.title, {
        body: self.pushData.body,
        icon: self.pushData.data ? self.pushData.data.icon : null
      }).then(function() {
        clients.matchAll({type: 'window'}).then(function (clientList) {
          if (clientList.length > 0) {
            messageToClient(clientList[0], {
              message: self.pushData.body // suppose it is: "Hello World !"
            });
          }
        });
      }));
    }
  }
});**/

/**self.addEventListener('fetch', event => {
  event.respondWith(
    caches.match(event.request, {ignoreSearch:true}).then(response => {
      return response || fetch(event.request);
    })
    .catch(() => {
      return caches.match('/offline/index.html');
  ))
});**/

