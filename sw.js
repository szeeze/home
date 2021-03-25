console.log('Script loaded!')
var cacheStorageKey = 'szeeze-pwa-1'

var cacheList = [
  "e.png",
]

self.addEventListener('install', function(event) {
	
  event.waitUntil(
  
    caches.open(cacheStorageKey).then(function(cache) {
		
		let urls = []; for(let x of cacheList) urls.push(x);
		
		return cache.addAll(urls);
    })
	
  );
});

//

self.addEventListener('fetch', function(event) {
	
  event.respondWith(caches.match(event.request).then(function(response) {
    // caches.match() always resolves
    // but in case of success response will have value
    if (response != void 0) {
		
		console.log('cache hit: ' + event.request);
		
      return response;
	  
    }
	else {
		
      return fetch(event.request).then(function (response) {
        
        let responseClone = response.clone();
        
        caches.open(cacheStorageKey).then(function (cache) {
			
          cache.put(event.request, responseClone);
		  
        });
		
		console.log('push');
		
        return response;
		
      }).catch(function () {
		  
		  //let notFound = new Response('<p>The resource was not found</p>', {
			//  headers: { 'Content-Type': 'text/html' },
			//  status: 404
			//});
			console.log('catch');
			
			let notFound = new Response('<p>The resource was not found</p>', {
					headers: { 'Content-Type': 'text/html' },
					status: 200
				});
			
			return notFound;//caches.match('/script/darth.jpg');
        //return notFound;//caches.match('/sw-test/gallery/myLittleVader.jpg');
      });
    }
  }));
});
