<?php
class Address
{
    private $db;

    function __construct()
    {
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if ($this->db->connect_error < 0) {
            die('Fel vid anslutning: ' + $this->db->connect_error);
        }
    }
    /* ADD ADDRESS */
    function addAddress($street, $postal, $city, $phone)
    {
        if (!$this->setStreet($street)) {
            return false;
        }
        if (!$this->setPostal($postal)) {
            return false;
        }
        if (!$this->setCity($city)) {
            return false;
        }
        if (!$this->setPhone($phone)) {
            return false;
        }


        $sql = "INSERT INTO address (street, postal,  city, phone)
        VALUES ('" . $this->street . "',  '" . $this->postal . "','" . $this->city . "', '" . $this->phone . "')";
        return $result = $this->db->query($sql);
    }

    /* GET ALL ADDRESSES */

    public function getAddress($id)
    {
        $sql = "SELECT * FROM address  WHERE id = " . $id . ";";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    /* GET ALL ADDRESSES WITHOUT ID*/

    public function getAddressNoId()
    {
        $sql = "SELECT * FROM address ORDER BY id DESC";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    /* UPDATE ADDRESS */
    function updateAddress($street, $postal, $city, $phone, $id)
    {
        if (!$this->setStreet($street)) {
            return false;
        }
        if (!$this->setPostal($postal)) {
            return false;
        }
        if (!$this->setCity($city)) {
            return false;
        }
        if (!$this->setPhone($phone)) {
            return false;
        }

        if (!$this->setId($id)) {
            return false;
        }

        $sql =  "UPDATE address SET street = '" . $street . "', postal = '" . $postal . "', city = '" . $city . "', phone = '" . $phone . "'  WHERE id = " . $id . ";";
        return $result = $this->db->query($sql);
    }

    /* DELETE SELECTED ADDRESS */

    public function deleteAddress($id)
    {
        $sql = "DELETE FROM address WHERE id = " . $id . ";";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    /* SETTERS */

    public function setStreet($street)
    {
        if ($street != "") {
            $this->street = $this->db->real_escape_string($street);
            return true;
        } else {
            return false;
        }
    }
    public function setCity($city)
    {
        if ($city != "") {
            $this->city = $this->db->real_escape_string($city);
            return true;
        } else {
            return false;
        }
    }
    public function setPostal($postal)
    {
        if ($postal != "") {
            $this->postal = $this->db->real_escape_string($postal);
            return true;
        } else {
            return false;
        }
    }
    public function setPhone($phone)
    {
        if ($phone != "") {
            $this->phone = $this->db->real_escape_string($phone);
            return true;
        } else {
            return false;
        }
    }


    public function setId($id)
    {
        if ($id != "") {
            $this->id = $this->db->real_escape_string($id);
            return true;
        } else {
            return false;
        }
    }
}
