<?php
class Website
{
    private $db;

    function __construct()
    {
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if ($this->db->connect_error < 0) {
            die('Fel vid anslutning: ' + $this->db->connect_error);
        }
    }
    /* ADD WEBSITE */
    function addWebsite($title, $address, $finished, $cases, $image)
    {
        if (!$this->setTitle($title)) {
            return false;
        }
        if (!$this->setAddress($address)) {
            return false;
        }
        if (!$this->setFinished($finished)) {
            return false;
        }
        if (!$this->setCases($cases)) {
            return false;
        }
        if (!$this->setImage($image)) {
            return false;
        }



        $sql = "INSERT INTO webpages (title, address,  finished, cases, image)
        VALUES ('" . $this->title . "',  '" . $this->address . "','" . $this->finished . "', '" . $this->cases . "', '" . $this->image . "')";
        return $result = $this->db->query($sql);
    }

    /* GET ALL WEBSITES */

    public function getWebsite($id)
    {
        $sql = "SELECT * FROM webpages  WHERE id = " . $id . ";";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    /* GET ALL WEBSITES WITHOUT ID*/

    public function getWebsiteNoId()
    {
        $sql = "SELECT * FROM webpages ORDER BY finished DESC";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    /* UPDATE WEBSITE */
    function updateWebsite($title, $address, $finished, $cases, $image, $id)
    {
        if (!$this->setTitle($title)) {
            return false;
        }
        if (!$this->setAddress($address)) {
            return false;
        }
        if (!$this->setFinished($finished)) {
            return false;
        }
        if (!$this->setCases($cases)) {
            return false;
        }
        if (!$this->setImage($image)) {
            return false;
        }
        if (!$this->setId($id)) {
            return false;
        }

        $sql =  "UPDATE webpages SET title = '" . $title . "', address = '" . $address . "', finished = '" . $finished . "', cases = '" . $cases . "' , image = '" . $image . "'  WHERE id = " . $id . ";";
        return $result = $this->db->query($sql);
    }

    /* DELETE SELECTED WEBSITE */

    public function deleteWebsite($id)
    {
        $sql = "DELETE FROM webpages WHERE id = " . $id . ";";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    /* SETTERS */

    public function setTitle($title)
    {
        if ($title != "") {
            $this->title = $this->db->real_escape_string($title);
            return true;
        } else {
            return false;
        }
    }
    public function setAddress($address)
    {
        if ($address != "") {
            $this->address = $this->db->real_escape_string($address);
            return true;
        } else {
            return false;
        }
    }
    public function setFinished($finished)
    {
        if ($finished != "") {
            $this->finished = $this->db->real_escape_string($finished);
            return true;
        } else {
            return false;
        }
    }
    public function setCases($cases)
    {
        if ($cases != "") {
            $this->cases = $this->db->real_escape_string($cases);
            return true;
        } else {
            return false;
        }
    }
    public function setImage($image)
    {
        if ($image != "") {
            $this->image = $this->db->real_escape_string($image);
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
