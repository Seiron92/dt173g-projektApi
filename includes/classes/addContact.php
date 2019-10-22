<?php
class Contact
{
    private $db;

    function __construct()
    {
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if ($this->db->connect_error < 0) {
            die('Fel vid anslutning: ' + $this->db->connect_error);
        }
    }
    /* ADD CONTACT */
    function addContact($facebook, $linkedin)
    {
        if (!$this->setFacebook($facebook)) {
            return false;
        }
        if (!$this->setLinkedin($linkedin)) {
            return false;
        }




        $sql = "INSERT INTO contact (facebook, linkedin)
        VALUES ('" . $this->facebook . "',  '" . $this->linkedin . "')";
        return $result = $this->db->query($sql);
    }

    /* GET ALL CONTACTS */

    public function getContact($id)
    {
        $sql = "SELECT * FROM contact  WHERE id = " . $id . ";";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    /* GET ALL CONTACTS WITHOUT ID*/

    public function getContactNoId()
    {
        $sql = "SELECT * FROM contact ORDER BY id DESC";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    /* UPDATE CONTACT */
    function updateContact($facebook, $linkedin, $id)
    {
        if (!$this->setFacebook($facebook)) {
            return false;
        }
        if (!$this->setLinkedin($linkedin)) {
            return false;
        }
        if (!$this->setId($id)) {
            return false;
        }

        $sql =  "UPDATE contact SET facebook = '" . $facebook . "', linkedin = '" . $linkedin . "' WHERE id = " . $id . ";";
        return $result = $this->db->query($sql);
    }

    /* DELETE SELECTED CONTACT */

    public function deleteContact($id)
    {
        $sql = "DELETE FROM contact WHERE id = " . $id . ";";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    /* SETTERS */

    public function setFacebook($facebook)
    {
        if ($facebook != "") {
            $this->facebook = $this->db->real_escape_string($facebook);
            return true;
        } else {
            return false;
        }
    }
    public function setLinkedin($linkedin)
    {
        if ($linkedin != "") {
            $this->linkedin = $this->db->real_escape_string($linkedin);
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
