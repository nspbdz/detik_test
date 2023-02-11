<?php 

require_once "../models/Ticket.php";

class ticketController extends Ticket {

    function check_ticket(){
        $data = parent::get_check_ticket();
	}


    function update_ticket(){
        echo "update_ticket";
        $data = parent::update_ticket();
	}
  
}