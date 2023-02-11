\<?php

if (php_sapi_name() != 'cli') {
    exit;
}

function eventSeeder()
{
            include '../config/database.php';
    
            $cities = array('Jakarta', 'London', 'New York', 'Paris', 'Tokyo');
            $count=5;
            try {
                for ($i = 1; $i < 5; $i++) {
                    $event_name = "Event $i";
                    $event_location = $cities[array_rand($cities)];
                    $event_date = date("Y-m-d");
                    $event_time = date("H:i:s");
                    $description = "Description for event $i";
    
                    $sql = "INSERT INTO events (event_name, event_location, event_date, event_time, description)
                    VALUES ('$event_name', '$event_location', '$event_date', '$event_time', '$description')";
    
                    if (mysqli_query($conn, $sql)) {
                    } else {
                        echo "Error inserting data: " . mysqli_error($conn) . "\n";
                    }
                }
                    echo $count ."Data Event inserted  successfully" ;
              }
              
              //catch exception
              catch(Exception $e) {
                echo 'Message: ' .$e->getMessage();
              }
            

    
}
