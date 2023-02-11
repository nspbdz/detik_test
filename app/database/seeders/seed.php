<?php


if (php_sapi_name() !== 'cli') {
    exit;
}

// 
include './event_seeder.php';
include './ticket_seeder.php';

// Menggunakan tipe data void untuk menandakan bahwa function migrateData tidak mengembalikan nilai

function seed(): void
{
eventSeeder();
    ticketSeeder();
}

seed();

?>