<?php


if (php_sapi_name() !== 'cli') {
    exit;
}

include './event_seeder.php';
include './ticket_seeder.php';


function seed()
{
    eventSeeder();
    ticketSeeder();
}

seed();

?>