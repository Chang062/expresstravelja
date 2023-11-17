<?php
class crud
{
    private $db;
    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function getHotels()
    {
        try {
            $sql = "SELECT * FROM hotels WHERE status = 1";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getRooms()
    {
        try {
            $sql = "SELECT * FROM `rooms` r inner join hotels h on r.hotel_id = h.id";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getRoomDetails($id)
    {
        try {
            $sql = "SELECT * from utilities u inner join rooms r on u.room_id = r.rm_id 
                where room_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function insertBookings($full_name, $check_in, $check_out, $email, $contact, $hotel_id, $room_id, $user_id)
    {
        try {

            $sql = "INSERT INTO attendee (full_name,email,contact,hotel_id,room_id,check_in,check_out,user_id) VALUES (:fullname,:email,:contact,:hotel_id,:room_id,:check_in,:check_out, :user_id)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':full_name', $full_name);
            $stmt->bindparam(':hotel_id', $hotel_id);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':contact', $contact);
            $stmt->bindparam(':room_id', $room_id);
            $stmt->bindparam(':check_in', $check_in);
            $stmt->bindparam(':check_out', $check_out);
            $stmt->bindparam(':user_id', $user_id);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
