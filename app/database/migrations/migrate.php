<?php


if (php_sapi_name() !== 'cli') {
    exit;
}

include './ticket_migration.php';
include './event_migration.php';

function migrateData()
{
    migrateEvents();
    migrateTickets();
}

migrateData()
?>