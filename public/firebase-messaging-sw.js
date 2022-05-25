/*
Give the service worker access to Firebase Messaging.
Note that you can only use Firebase Messaging here, other Firebase libraries are not available in the service worker.
*/
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/7.23.0/firebase-messaging.js');

/*
Initialize the Firebase app in the service worker by passing in the messagingSenderId.
* New configuration for app@pulseservice.com
*/
firebase.initializeApp({

    apiKey: "AIzaSyDXOAtLEHbRaTK8ymaLGY9yx0r2YyZmtAw",
    authDomain: "fir-crud-c43ad.firebaseapp.com",
    projectId: "fir-crud-c43ad",
    storageBucket: "fir-crud-c43ad.appspot.com",
    messagingSenderId: "517560537826",
    appId: "1:517560537826:web:01ed82c55ab91f147fc4bb",
    measurementId: "G-Q47CGQ8QSK"

});

/*
Retrieve an instance of Firebase Messaging so that it can handle background messages.
*/
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(function(payload) {
    console.log(
        "[firebase-messaging-sw.js] Received background message ",
        payload,
    );
    /* Customize notification here */
    const notificationTitle = "Background Message Title";
    const notificationOptions = {
        body: "Background Message body.",
        icon: "/itwonders-web-logo.png",
    };

    return self.registration.showNotification(
        notificationTitle,
        notificationOptions,
    );
});