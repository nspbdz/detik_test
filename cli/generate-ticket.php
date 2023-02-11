<?php


if (php_sapi_name() !== 'cli') {
    exit;
}


function generateTicket($id, $qty)
{
    
    // menggunakan Prepared Statements dan Transaksi:

    include '../app/database/config/database.php';
    try {

          // optimasi menggunakan prepared statement untuk mencegah sql injection
        // Argumen "ssds" mencantumkan jenis data yang menjadi parameternya.
        // s string d double 
        // bind parameter yang dikirim oleh variable akan dibaca hanya sebagai parameter, tidak dibaca sebagai query yang akan dieksekusi oleh server.

        //optimasi transaction jadi dijalankan sekaligus atau tidak dijalankan sama sekali
        //begin_transaction  memulai transaksi pada permulaan statement
        $conn->begin_transaction();

        // preparing statements 
        $stmt = $conn->prepare("INSERT INTO tickets (ticket_code, status, event_id, price) VALUES (?, ?, ?, ?)");
        // mengikat parameter / bind data 
        $stmt->bind_param("ssds", $code, $status, $id, $price);

        for ($i = 1; $i < $qty; $i++) {
            $code = "DTK" . substr(md5(rand()), 0, 7);
            $status = "available";
            $price = rand(10, 100) . "." . rand(0, 99);

            if ($stmt->execute() === false) {
                // rollback membatalkan semua operasi
                $conn->rollback();
                echo "Error inserting data: " . $stmt->error . "\n";
                break;
            }
        }
        // menyimpan semua operasi  setelah beginTransaction
        $conn->commit();
        $stmt->close();
        echo $qty ." Data Ticket inserted  successfully" ;
    } catch(Exception $e) {
        echo 'Message: ' .$e->getMessage();
    }
}
$id = (int)$argv[1];
$qty = (int)$argv[2];


generateTicket($id, $qty);

?>