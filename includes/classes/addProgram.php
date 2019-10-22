<?php
class Program
{
    private $db;

    function __construct()
    {
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if ($this->db->connect_error < 0) {
            die('Fel vid anslutning: ' + $this->db->connect_error);
        }
    }
    /* ADD PROGRAM */
    function addProgram($todate, $fromdate, $program, $col, $webpage, $type)
    {
        if (!$this->setToDate($todate)) {
            return false;
        }
        if (!$this->setFromDate($fromdate)) {
            return false;
        }
        if (!$this->setProgram($program)) {
            return false;
        }
        if (!$this->setCol($col)) {
            return false;
        }
        if (!$this->setWebpage($webpage)) {
            return false;
        }
        if (!$this->setType($type)) {
            return false;
        }


        $sql = "INSERT INTO program (todate, fromdate,  program, col, webpage, type)
        VALUES ('" . $this->todate . "',  '" . $this->fromdate . "','" . $this->program . "', '" . $this->col . "', '" . $this->webpage . "', '" . $this->type . "')";
        return $result = $this->db->query($sql);
    }

    /* GET ALL PROGRAMS */

    public function getProgram($id)
    {
        $sql = "SELECT * FROM program  WHERE id = " . $id . ";";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    /* GET ALL PROGRAMS WITHOUT ID*/

    public function getProgramNoId()
    {
        $sql = "SELECT * FROM program ORDER BY fromdate DESC";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    /* UPDATE PROGRAM */
    function updateProgram($todate, $fromdate, $program, $col, $webpage, $type, $id)
    {
        if (!$this->setToDate($todate)) {
            return false;
        }
        if (!$this->setFromDate($fromdate)) {
            return false;
        }
        if (!$this->setProgram($program)) {
            return false;
        }
        if (!$this->setCol($col)) {
            return false;
        }
        if (!$this->setWebpage($webpage)) {
            return false;
        }
        if (!$this->setType($type)) {
            return false;
        }
        if (!$this->setId($id)) {
            return false;
        }

        $sql =  "UPDATE program  SET todate = '" . $todate . "', fromdate = '" . $fromdate . "', program = '" . $program . "', col = '" . $col . "' , webpage = '" . $webpage . "' , type = '" . $type . "' WHERE id = " . $id . ";";
        return $result = $this->db->query($sql);
    }

    /* DELETE SELECTED PROGRAM */

    public function deleteProgram($id)
    {
        $sql = "DELETE FROM program WHERE id = " . $id . ";";
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
    public function setProgram($program)
    {
        if ($program != "") {
            $this->program = $this->db->real_escape_string($program);
            return true;
        } else {
            return false;
        }
    }
    public function setCol($col)
    {
        if ($col != "") {
            $this->col = $this->db->real_escape_string($col);
            return true;
        } else {
            return false;
        }
    }
    public function setWebpage($webpage)
    {
        if ($webpage != "") {
            $this->webpage = $this->db->real_escape_string($webpage);
            return true;
        } else {
            return false;
        }
    }
    public function setType($type)
    {
        if ($type != "") {
            $this->type = $this->db->real_escape_string($type);
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
