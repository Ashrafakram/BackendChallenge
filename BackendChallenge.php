<?php

$ch = curl_init('https://coderbyte.com/api/challenges/json/age-counting'); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HEADER, 0);

$data = curl_exec($ch);
curl_close($ch);

$response = json_decode($data, true);
$dataString = $response['data'];

$items = explode(',', $dataString);

$count = 0;

foreach ($items as $item) {
    $item = trim($item);
    
    if (strpos($item, 'age=') !== false) {
        $age = (int) str_replace('age=', '', $item);
        
        if ($age >= 50) { 
            $count++;
        }
    }
}

echo $count;
?>
