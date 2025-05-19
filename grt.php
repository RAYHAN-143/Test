<?php

$number = $_GET['number'] ?? ''; //এখানে  url থেকে নাম্বার ইনপোট নেওয়া হবে 


if(empty($number)) {
    die("এখানে ১০ ডিজিটের একটি নাম্বার দিন");
} //এখানে দেখানো হয়েছে, যদি নাম্বার ছারা api কল করে তাহলে এই ইরোরটা আসবে



$url = "https://webloginda.grameenphone.com/backend/api/v1/otp";
$data = "msisdn=$number"; //এখানে api আর data বসানো হয়েছে, data তে নাম্বার ইনপোট নেওয়া হয়েছে 



//এখানে হেডার্স বসানো হয়েছে, হেডার্স সবটা না বসি এই ২ লাইন বসালেই হয়
$headers = [
    'Content-Type: application/x-www-form-urlencoded',
    'User-Agent: Mozilla/5.0'
];



//এখন আমরা url,data,headers এই গুলা কে HTTP POST রিকুয়েষ্ট পাঠানো যার জন্য আমাদের ch লাইবেরি লাগবে
$ch = curl_init();

// cURL অপশন সেট করা হচ্ছে
curl_setopt($ch, CURLOPT_URL, $url); // API URL সেট করা
curl_setopt($ch, CURLOPT_POST, 1); // POST মেথড ব্যবহার করা
curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // ডাটা সেট করা
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // রেসপন্স রিটার্ন করার জন্য
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); // হেডার সেট করা

// API কল করা হচ্ছে এবং রেসপন্স নেওয়া হচ্ছে
$response = curl_exec($ch);

// cURL কানেকশন ক্লোজ করা হচ্ছে
curl_close($ch);

// রেসপন্স দেখানো হচ্ছে
echo "API এর মালিক: Abu Rayhan<br>";
echo "স্ট্যাটাস: $response<br>";

?>