<?php

// use App\Models\User;
// if(!function_exists('notification')){

//     function notification($email)
//     {
//     $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();
//     $SERVER_API_KEY = 'AAAAeIEDEuI:APA91bHSiO2JL3UxR3vpAwRc3y2xnkKnDDFHNMUwkJG8IBTH6s5gXZ8lOM9gPdeiLWwZ3M3LT4u-O0HK0PkM-Z7kyteMFZ01ZOgdfG4fJGwyDPFVTCcWPcfy00wTcdD8bC1xC0tscoyH';

//     $data = [
//         "registration_ids" => $firebaseToken,
//         "notification" => [
//             "title" => "login notification",
//             "body" => $request->email,
//         ]
//     ];
//     $dataString = json_encode($data);

//     $headers = [
//         'Authorization: key=' . $SERVER_API_KEY,
//         'Content-Type: application/json',
//     ];

//     $ch = curl_init();

//     curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
//     curl_setopt($ch, CURLOPT_POST, true);
//     curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
//     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
//     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

//     $response = curl_exec($ch);
// }

// }