<?php

if (php_sapi_name() != 'cli') {
    exit;
}


function migrateEvents()
{
    include '../config/database.php';

    $table_name = 'events';
    $migrate_query = "CREATE TABLE $table_name (
        id INT AUTO_INCREMENT PRIMARY KEY,
        event_name VARCHAR(100) NOT NULL,
        event_location VARCHAR(100) NOT NULL,
        event_date DATE NOT NULL,
        event_time TIME NOT NULL,
        description TEXT NOT NULL,
        created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
    );";

    $result = $conn->query($migrate_query);
    if ($result) {
        echo "Table $table_name has been created successfully!" . PHP_EOL;
    } else {
        echo "Error creating table $table_name: " . $conn->error . PHP_EOL;
    }
}


// Note: It's important to also secure the database connection and prevent SQL injection attacks. This can be done by using prepared statements or parameterized queries.