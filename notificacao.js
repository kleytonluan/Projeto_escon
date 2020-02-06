importScripts('https://www.gstatic.com/firebasejs/4.8.1/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/4.8.1/firebase-messaging.js');

import firebase from 'firebase';
export const inicializarFirebase = () => {
  firebase.initializeApp({
    messagingSenderId: "Seu messagingSenderId"
  });


navigator.serviceWorker
    .register('/sw.js')
    .then((registration) => {
      firebase.messaging().useServiceWorker(registration);
    });
}

export const pedirPermissaoParaReceberNotificacoes = async () => {
  try {
    const messaging = firebase.messaging();
    await messaging.requestPermission();
    const token = await messaging.getToken();
    console.log('token do usuário:', token);
    return token;
  } catch (error) {
    console.error(error);
  }
}

