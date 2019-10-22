<?php
class Work
{
    private $db;

    function __construct()
    {
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if ($this->db->connect_error < 0) {
            die('Fel vid anslutning: ' + $this->db->connect_error);
        }
    }
    /* ADD COURSE */
    function addWorkPlace($todate, $fromdate, $workPlace, $title)
    {
        if (!$this->setToDate($todate)) {
            return false;
        }
        if (!$this->setFromDate($fromdate)) {
            return false;
        }
        if (!$this->setWorkPlace($workPlace)) {
            return false;
        }
        if (!$this->setTitle($title)) {
            return false;
        }



        $sql = "INSERT INTO work (todate, fromdate, work_place, title)
        VALUES ('" . $this->todate . "', '" . $this->fromdate . "', '" . $this->workPlace . "', '" . $this->title . "')";
        return $result = $this->db->query($sql);
    }

    /* GET ALL WORK */

    public function getWork($id)
    {
        $sql = "SELECT * FROM work WHERE id = " . $id . ";";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    /* GET ALL WORKPLACES WITHOUT ID*/

    public function getWorkNoId()
    {
        $sql = "SELECT * FROM work ORDER BY fromdate DESC";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    /* UPDATE WORK */
    function updateWork($todate, $fromdate, $workPlace, $title, $id)
    {
        if (!$this->setToDate($todate)) {
            return false;
        }
        if (!$this->setFromDate($fromdate)) {
            return false;
        }
        if (!$this->setWorkPlace($workPlace)) {
            return false;
        }
        if (!$this->setTitle($title)) {
            return false;
        }
        if (!$this->setId($id)) {
            return false;
        }
        $sql =  "UPDATE work SET todate = '" . $todate . "', fromdate = '" . $fromdate . "', work_place = '" . $workPlace . "' , title = '" . $title . "' WHERE id = " . $id . ";";
        return $result = $this->db->query($sql);
    }

    /* DELETE SELECTED WORKPLACE */

    public function deleteWork($id)
    {
        $sql = "DELETE FROM work WHERE id = " . $id . ";";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    /* SETTERS */

    public function setToDate($todate)
    {
        if ($todate != "") {
            $this->todate = $this->db->real_escape_string($todate);
            return true;
        } else {
            return false;
        }
    }
    public function setFromDate($fromdate)
    {
        if ($fromdate != "") {
            $this->fromdate = $this->db->real_escape_string($fromdate);
            return true;
        } else {
            return false;
        }
    }
    public function setWorkPlace($workPlace)
    {
        if ($workPlace != "") {
            $this->workPlace = $this->db->real_escape_string($workPlace);
            return true;
        } else {
            return false;
        }
    }
    public function setTitle($title)
    {
        if ($title != "") {
            $this->title = $this->db->real_escape_string($title);
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
