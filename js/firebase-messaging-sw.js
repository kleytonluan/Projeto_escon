/**importScripts('https://www.gstatic.com/firebasejs/4.4.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/4.4.0/firebase-messaging.js');

var config = {
apiKey: "AIzaSyAZsFxnu1KUfNHvXcxxT4k_HoA2Vf_s4xI",
authDomain: "escon-9ba26.firebaseapp.com",
databaseURL: "https://escon-9ba26.firebaseio.com",
projectId: "escon-9ba26",
storageBucket: "escon-9ba26.appspot.com",
messagingSenderId: "533904781159"
};
firebase.initializeApp(config);

const messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function(payload) {
	const title = 'Hello World';
	const options = {
		body: payload.data.body
	};
	return self.registration.showNotification(title, options);
});**/