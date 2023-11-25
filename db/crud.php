<?php
class crud
{
    private $db;
    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function insertHotel($name, $location, $description, $image)
    {
        try {

            $sql = "INSERT INTO hotels (name,location,description,image) VALUES (:name,:location,:description,:image)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':name', $name);
            $stmt->bindparam(':location', $location);
            $stmt->bindparam(':description', $description);
            $stmt->bindparam(':image', $image);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function updateHotel($id, $name, $location, $description)
    {
        try {
            $sql = "UPDATE `hotels` SET `name`=:name,`location`=:location,`description`=:description WHERE id = :id ";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':name', $name);
            $stmt->bindparam(':location', $location);
            $stmt->bindparam(':description', $description);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getHotelById($id)
    {
        try {
            $sql = "SELECT * FROM `hotels` where id = :id";
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

    public function deleteHotel($id)
    {
        try {
            $sql = "DELETE FROM hotels WHERE id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }



    public function getHotels()
    {
        try {
            $sql = "SELECT * FROM hotels WHERE stats = 1";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getAllHotels()
    {
        try {
            $sql = "SELECT * FROM hotels";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function insertRoom($type, $hotel_id, $beds, $num_persons, $size, $view, $price, $rm_image)
    {
        try {

            $sql = "INSERT INTO rooms (type,hotel_id,beds,num_persons,size,view,price,rm_image) VALUES (:type,:hotel_id,:beds,:num_persons,:size,:view,:price,:rm_image)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':type', $type);
            $stmt->bindparam(':hotel_id', $hotel_id);
            $stmt->bindparam(':beds', $beds);
            $stmt->bindparam(':num_persons', $num_persons);
            $stmt->bindparam(':size', $size);
            $stmt->bindparam(':view', $view);
            $stmt->bindparam(':price', $price);

            $stmt->bindparam(':rm_image', $rm_image);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function updateRoom($rm_id, $type, $hotel_id, $beds, $num_persons, $size, $view, $price)
    {
        try {
            $sql = "UPDATE rooms SET `type`=:type, hotel_id=:hotel_id, beds=:beds, num_persons=:num_persons, size=:size, view=:view, price=:price WHERE rm_id=:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $rm_id);
            $stmt->bindparam(':type', $type);
            $stmt->bindparam(':hotel_id', $hotel_id);
            $stmt->bindparam(':beds', $beds);
            $stmt->bindparam(':num_persons', $num_persons);
            $stmt->bindparam(':size', $size);
            $stmt->bindparam(':view', $view);
            $stmt->bindparam(':price', $price);

            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function deleteRoom($id)
    {
        try {
            $sql = "DELETE FROM rooms WHERE rm_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getRooms()
    {
        try {
            $sql = "SELECT * FROM `rooms` r inner join hotels h on r.hotel_id = h.id WHERE stat = 1";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
    public function getAllRooms()
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
            $sql = "SELECT * from ((utilities u inner join rooms r on u.room_id = r.rm_id) inner join hotels h on r.hotel_id = h.id)
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
    public function getRoomById($id)
    {
        try {
            $sql = "SELECT * FROM `rooms` r inner join hotels h on r.hotel_id = h.id 
                where rm_id = :id";
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


    public function insertBookings($full_name, $check_in, $check_out, $email, $contact, $hotel_id, $room_id, $payment)
    {
        try {
            $status = "Pending";
            $user_id = $_SESSION["userid"];
            $sql = "INSERT INTO bookings (full_name,email,contact,hotel_id,room_id,check_in,check_out,user_id,payment,status) VALUES (:full_name,:email,:contact,:hotel_id,:room_id,:check_in,:check_out, :user_id,:payment,:status)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':full_name', $full_name);
            $stmt->bindparam(':hotel_id', $hotel_id);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':contact', $contact);
            $stmt->bindparam(':room_id', $room_id);
            $stmt->bindparam(':check_in', $_POST['check_in']);
            $stmt->bindparam(':check_out', $_POST['check_out']);
            $stmt->bindparam(':user_id', $user_id);
            $stmt->bindparam(':status', $status);
            $stmt->bindparam(':payment', $payment);

            $stmt->execute();
            echo "<script>window.location.href='pay.php'</script>";
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
