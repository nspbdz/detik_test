<?php

if (php_sapi_name() != 'cli') {
    exit;
}

function migrateTickets()
{
    include '../config/database.php';


    $table_name = 'tickets';
    $migrate_query = "CREATE TABLE $table_name (
        id INT AUTO_INCREMENT PRIMARY KEY,
        ticket_code VARCHAR(100) NOT NULL,
        status VARCHAR(100) DEFAULT 'available' NOT NULL,
        event_id INT NOT NULL,
        price DECIMAL(10, 2) NOT NULL,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (event_id) REFERENCES events(id)
    );";

    $result = $conn->query($migrate_query);
    if ($result) {
        echo "Table $table_name has been created successfully!" . PHP_EOL;
    } else {
        echo "Error creating table $table_name: " . $conn->error . PHP_EOL;
    }
}

