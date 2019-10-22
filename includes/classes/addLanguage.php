<?php
class Language
{
    private $db;

    function __construct()
    {
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if ($this->db->connect_error < 0) {
            die('Fel vid anslutning: ' + $this->db->connect_error);
        }
    }
    /* ADD LANGUAGE */
    function addLanguage($language, $skills)
    {
        if (!$this->setLanguage($language)) {
            return false;
        }
        if (!$this->setSkills($skills)) {
            return false;
        }


        $sql = "INSERT INTO langugages (language, skills)
        VALUES ('" . $this->language . "',  '" . $this->skills . "')";
        return $result = $this->db->query($sql);
    }

    /* GET ALL LANGUAGES */

    public function getLanguage($id)
    {
        $sql = "SELECT * FROM langugages  WHERE id = " . $id . ";";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    /* GET ALL LANGUAGES WITHOUT ID*/

    public function getLanguageNoId()
    {
        $sql = "SELECT * FROM langugages ORDER BY id ASC";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    /* UPDATE LANGUAGE */
    function updateLanguage($language, $skills, $id)
    {
        if (!$this->setLanguage($language)) {
            return false;
        }
        if (!$this->setSkills($skills)) {
            return false;
        }

        if (!$this->setId($id)) {
            return false;
        }

        $sql =  "UPDATE langugages SET language = '" . $language . "', skills = '" . $skills . "' WHERE id = " . $id . ";";
        return $result = $this->db->query($sql);
    }

    /* DELETE SELECTED LANGUAGE */

    public function deleteLanguage($id)
    {
        $sql = "DELETE FROM langugages WHERE id = " . $id . ";";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    /* SETTERS */

    public function setLanguage($language)
    {
        if ($language != "") {
            $this->language = $this->db->real_escape_string($language);
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
