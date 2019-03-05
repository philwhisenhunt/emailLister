<?php
//$list = ["blog, YOO, run","bear, eat, no","hey, whats up, hello"];

// $list = ["Phil Whisenhunt, phil@philwhisenhunt.com", "bob Marley, Bob@reggae.com"];
$file = fopen("list.csv", "a");

$receivedPost = file_get_contents('php://input');
// echo "received post: \n";
// echo $receivedPost;

// echo "and now a var dump version: ";
var_dump($receivedPost);


// echo "\n";
$notJson = json_decode($receivedPost);
echo "Your name is: " . $notJson->name;
echo "And your email address is " . $notJson->email;
// echo "this is notJSON: \n";
// print_r($notJson);
echo "\n \n";


$nowJsonAgain = json_encode($notJson);
// echo $nowJsonAgain["name"] . " is the name. ";
// var_dump($nowJsonAgain);
//echo $nowJsonAgain;
foreach($notJson as $line){
    fputcsv($file, explode(',', $line));
}

fclose($file); 

//take in the json
//take each part and write it to an array
//write the things in that array to the csv file, sepearted by commas. 

//how to write to the same line csv 