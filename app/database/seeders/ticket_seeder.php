\<?php

if (php_sapi_name() != 'cli') {
    exit;
}

function ticketSeeder()
{
            include '../config/database.php';

            $count=10;
            //trigger exception in a "try" block
            try {
                for ($i = 1; $i < $count; $i++) {
                    $event_id =mt_rand(1, 4); // Assuming events have already been inserted
                    $code = "DTK" . substr(md5(rand()), 0, 6);
                    $status = "available";
                    $price = rand(10, 100) . "." . rand(0, 99);
                
                    $sql = "INSERT INTO tickets (ticket_code	, status, event_id, price)
                    VALUES ('$code', '$status', '$event_id', '$price')";
                 
                    if (mysqli_query($conn, $sql)) {
                        // echo $count ."Data inserted  successfully" ;
                    } else {
                        echo "Error inserting data: " . mysqli_error($conn) . "\n";
                    }
                }
                echo $count ."Data Ticket inserted  successfully" ;
            }
            
            //catch exception
            catch(Exception $e) {
                echo 'Message: ' .$e->getMessage();
            }
    
}
