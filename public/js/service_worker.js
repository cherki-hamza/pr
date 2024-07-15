self.addEventListener('install', event => {
    console.log('Service Worker: Installed');
    event.waitUntil(self.skipWaiting());
  });

  self.addEventListener('activate', event => {
    console.log('Service Worker: Activated');
    event.waitUntil(self.clients.claim());
  });

  self.addEventListener('fetch', event => {
    console.log('Service Worker: Fetch', event.request.url);
  });

  self.addEventListener('push', event => {
    console.log('Service Worker: Push', event);
    const data = event.data.json();
    const options = {
      body: data.body,
      icon: data.icon,
      badge: data.badge
    };
    event.waitUntil(
      self.registration.showNotification(data.title, options)
    );
  });
