<?php 
// require_once "../database/config/database.php";

require_once "../controllers/TicketController.php";


if(function_exists($_GET['function'])) {
    $_GET['function']();
 }   

 function checkTicket()
 {
    $TicketController = new ticketController();
    $TicketController->check_ticket();
 }

 
 function updateTicket()
 {
    $TicketController = new ticketController();
    $TicketController->update_ticket();
 }
