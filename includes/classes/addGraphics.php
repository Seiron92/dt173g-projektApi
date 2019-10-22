<?php
class Graphic
{
    private $db;

    function __construct()
    {
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if ($this->db->connect_error < 0) {
            die('Fel vid anslutning: ' + $this->db->connect_error);
        }
    }
    /* ADD GRAPHICS */
    function addGraphic($title, $cases, $image)
    {
        if (!$this->setTitle($title)) {
            return false;
        }

        if (!$this->setCases($cases)) {
            return false;
        }
        if (!$this->setImage($image)) {
            return false;
        }



        $sql = "INSERT INTO portfolio (title, cases, image)
        VALUES ('" . $this->title . "', '" . $this->cases . "', '" . $this->image . "')";
        return $result = $this->db->query($sql);
    }

    /* GET ALL GRAPHICS */

    public function getGraphic($id)
    {
        $sql = "SELECT * FROM portfolio  WHERE id = " . $id . ";";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    /* GET ALL GRAPHICS WITHOUT ID*/

    public function getGraphicNoId()
    {
        $sql = "SELECT * FROM portfolio ORDER BY id DESC";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    /* UPDATE GRAPHICS */
    function updateGraphic($title, $cases, $image, $id)
    {
        if (!$this->setTitle($title)) {
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

        $sql =  "UPDATE portfolio SET title = '" . $title . "', cases = '" . $cases . "', image = '" . $image . "'  WHERE id = " . $id . ";";
        return $result = $this->db->query($sql);
    }

    /* DELETE SELECTED GRAPHIC */

    public function deleteGraphic($id)
    {
        $sql = "DELETE FROM portfolio WHERE id = " . $id . ";";
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
