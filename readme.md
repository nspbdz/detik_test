1. masukan folder ke dalam xampp/htdocs
2. jalankan XAMPP
3. buat database dengan nama detik_test
4. jika membuat database dengan nama yang lain masuk ke database.php
   edit bagian $dbname sesuaikan dengan nama database yang anda buat
5. untuk migration
   masuk ke terminal masuk ke direktory migrations
   jika kita berada di terminal di folder ini / detik_test
   maka jalankan ini di terminal cd .\app\database\migrations\
    lalu jalankan cli : php migrate.php
6. untuk seeder
   masuk ke terminal masuk ke direktory seeder
   jika kita berada di terminal di folder ini / detik_test
   maka jalankan ini di terminal cd .\app\database\seeders\
    lalu jalankan cli : php seed.php

7. untuk menjalankan generate ticket
   masuk ke terminal masuk ke direktory cli
   jika kita berada di terminal di folder ini / detik_test
   maka jalankan ini di terminal cd cli
   lalu jalankan cli : php generate-ticket.php 1 100
   notes \* syarat harus melakukan migration dan seeder dulu
   agar sudah ada database dan data seeder

8. import postman collection di file : detikcom.postman_collection
9. jalankan postman request untuk updateTicket
   isikan data request dengan yang ada di dalam database
   contoh:
   event_id:3
   ticket_code:DTK08f4e1
   status:claimed
   untuk status bisa ganti dengan salah satu di bawah ini
   available
   claimed
   expired

10. jalankan postman request untuk checkTicket
    isikan data request dengan yang ada di dalam database
    contoh:
    event_id:3
    ticket_code:DTK08f4e1

notes* jika gagal dalam migration bisa gunakan detik_test.sql
yang ada di dalam folder db sql
import ke database file sql tersebut

