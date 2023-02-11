<?php

class Ticket  {
	
	
	function update_ticket(){
		return $this->ticket_update();
	}

    function get_check_ticket(){
		return $this->ticket_check();
	}

    // private function agar tidak bisa di akses dari luar
    private function ticket_update() {

        require_once '../database/config/database.php';

        $ticket_code = $_POST['ticket_code'];
        $event_id = $_POST['event_id'];
        $status = $_POST['status'];

        $queryUpdate = "UPDATE tickets SET STATUS = ? WHERE tickets.ticket_code = ? AND event_id = ?";
        $stmt = $conn->prepare($queryUpdate);
        $stmt->bind_param("ssi", $status, $ticket_code, $event_id);
        $stmt->execute();
        $stmt->close();
    
        $query = "SELECT ticket_code, status, updated_at FROM tickets WHERE tickets.ticket_code = ? AND event_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $ticket_code, $event_id);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
    
        $data = array();
        while ($row = $result->fetch_assoc()) {
          $data[] = $row;
        }
    
        if ($data) {
          $response = array(
            'status' => 1,
            'message' => 'Success',
            'data' => $data
          );
        } else {
          $response = array(
            'status' => 0,
            'message' => 'No Data Found'
          );
        }
    
        header('Content-Type: application/json');
        echo json_encode($response);
      }
    	
	private function ticket_check(){
        
        // global $conn;
        require_once '../database/config/database.php';
 
        $ticket_code = $_POST['ticket_code'];
        $event_id = $_POST['event_id'];
    
        $query = "SELECT ticket_code, status FROM tickets WHERE ticket_code = ? AND event_id = ?";
        // preparing statements 
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sd", $ticket_code, $event_id);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows > 0) {
            $data = array();
            while($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            $response = array(
                'status' => 1,
                'message' => 'Success',
                'data' => $data
            );
        } else {
            $response = array(
                'status' => 0,
                'message' => 'No Data Found'
            );
        }
    
        header('Content-Type: application/json');
        echo json_encode($response);
		
	}

	

}
?>