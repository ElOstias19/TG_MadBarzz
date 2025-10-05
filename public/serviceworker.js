// Nombre de la caché
const CACHE_NAME = 'tg-madbarzz-cache-v1';

// Archivos a cachear
const urlsToCache = [
  '/',
  '/manifest.json',
  '/assets_private/images/favicon.png'
];

// Instalación del Service Worker
self.addEventListener('install', (event) => {
  console.log('[ServiceWorker] Instalando...');
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then((cache) => {
        console.log('[ServiceWorker] Archivos en caché');
        return cache.addAll(urlsToCache);
      })
      .catch((err) => console.error('[ServiceWorker] Error al agregar a la caché:', err))
  );
  // Activación inmediata
  self.skipWaiting();
});

// Activación del Service Worker
self.addEventListener('activate', (event) => {
  console.log('[ServiceWorker] Activado');
  event.waitUntil(clients.claim());
});

// Interceptar requests para usar caché primero
self.addEventListener('fetch', (event) => {
  event.respondWith(
    caches.match(event.request)
      .then((response) => response || fetch(event.request))
  );
});

// Listener de push notifications
self.addEventListener('push', (event) => {
  let data = {
    title: 'Notificación',
    body: 'Tienes un nuevo mensaje',
    icon: '/assets_private/images/favicon.png'
  };

  if (event.data) {
    try {
      data = event.data.json();
    } catch (err) {
      console.error('[ServiceWorker] Error parseando datos push:', err);
    }
  }

  event.waitUntil(
    self.registration.showNotification(data.title, {
      body: data.body,
      icon: data.icon
    })
  );
});

// Click en notificación
self.addEventListener('notificationclick', (event) => {
  event.notification.close();
  event.waitUntil(clients.openWindow('/'));
});
