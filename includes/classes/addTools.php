<?php
class Tools
{
    private $db;

    function __construct()
    {
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if ($this->db->connect_error < 0) {
            die('Fel vid anslutning: ' + $this->db->connect_error);
        }
    }
    /* ADD TOOL */
    function addTool($tool, $skills)
    {
        if (!$this->setTool($tool)) {
            return false;
        }
        if (!$this->setSkills($skills)) {
            return false;
        }


        $sql = "INSERT INTO tools (tool, skills)
        VALUES ('" . $this->tool . "',  '" . $this->skills . "')";
        return $result = $this->db->query($sql);
    }

    /* GET ALL TOOLS */

    public function getTool($id)
    {
        $sql = "SELECT * FROM tools  WHERE id = " . $id . ";";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    /* GET ALL TOOLS WITHOUT ID*/

    public function getToolNoId()
    {
        $sql = "SELECT * FROM tools ORDER BY id ASC";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    /* UPDATE TOOL */
    function updateTool($tool, $skills, $id)
    {
        if (!$this->setTool($tool)) {
            return false;
        }
        if (!$this->setSkills($skills)) {
            return false;
        }

        if (!$this->setId($id)) {
            return false;
        }

        $sql =  "UPDATE tools SET tool = '" . $tool . "', skills = '" . $skills . "' WHERE id = " . $id . ";";
        return $result = $this->db->query($sql);
    }

    /* DELETE SELECTED TOOL */

    public function deleteTool($id)
    {
        $sql = "DELETE FROM tools WHERE id = " . $id . ";";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    /* SETTERS */

    public function setTool($tool)
    {
        if ($tool != "") {
            $this->tool = $this->db->real_escape_string($tool);
            return true;
        } else {
            return false;
        }
    }
    public function setSkills($skills)
    {
        if ($skills != "") {
            $this->skills = $this->db->real_escape_string($skills);
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
