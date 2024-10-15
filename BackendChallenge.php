<?php

// Initialize a cURL session to perform a GET request
$ch = curl_init('https://coderbyte.com/api/challenges/json/age-counting'); 

// Set cURL options
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the response as a string instead of outputting it directly
curl_setopt($ch, CURLOPT_HEADER, 0); // Exclude the header from the output

// Execute the cURL request and store the response in $data
$data = curl_exec($ch);

// Close the cURL session to free up resources
curl_close($ch);

// Decode the JSON response into an associative array
$response = json_decode($data, true);

// Access the 'data' key from the response
$dataString = $response['data'];

// Split the string into individual items based on the comma separator
$items = explode(',', $dataString);

// Initialize a counter to track the number of items with age >= 50
$count = 0;

// Iterate through each item in the array
foreach($items as $item) {
    // Trim whitespace from the item
    $item = trim($item);

    // Check if the item contains 'age='
    if(strpos($item, 'age=') !== false) {
        // Extract the age by removing the 'age' part and converting it to an integer
        $age = (int) str_replace('age=', '', $item);

        // Increment the counter if the age is greater than or equal to 50
        if ($age >= 50){ 
            $count++;
        }
    }
}

// Output the final count of items with age >= 50
echo $count;

?>
