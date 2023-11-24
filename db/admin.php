<?php

class admin
{
    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }

    public function insertAdmin($username, $email, $password)
    {
        try {
            $result = $this->getAdminbyUsername($username);
            if ($result['num'] > 0) {
                header("location: ../adminPanel/layouts/errormessage.php");
                return false;
            } else {
                $new_password = sha1($password . $username);
                $sql = "INSERT INTO admins (username,email,password) VALUES (:username,:email,:password)";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':username', $username);
                $stmt->bindparam(':email', $email);
                $stmt->bindparam(':password', $new_password);

                $stmt->execute();
                return true;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getAdmin($username, $password)
    {
        try {
            $sql = "select * from admins where username = :username AND password = :password ";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username', $username);
            $stmt->bindparam(':password', $password);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getAdminbyUsername($username)
    {
        try {
            $sql = "select count(*) as num from admins where username = :username";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':username', $username);

            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getAdmins()
    {
        try {
            $sql = "SELECT * FROM Admins";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
