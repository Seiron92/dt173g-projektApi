<?php
class PortfolioPage
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
    function addPortfoliopage($heading, $sub, $text)
    {
        if (!$this->setHeading($heading)) {
            return false;
        }
        if (!$this->setSub($sub)) {
            return false;
        }
        if (!$this->setText($text)) {
            return false;
        }


        $sql = "INSERT INTO portfolio_page (heading, sub, text)
        VALUES ('" . $this->heading . "',  '" . $this->sub . "', '" . $this->text . "')";
        return $result = $this->db->query($sql);
    }

    /* GET ALL PORTFOLIO PAGES */

    public function getPortfoliopage($id)
    {
        $sql = "SELECT * FROM portfolio_page WHERE id = " . $id . ";";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    /* GET ALL PORTFOLIO PAGES WITHOUT ID*/

    public function getPortfoliopageNoId()
    {
        $sql = "SELECT * FROM portfolio_page ORDER BY id DESC";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    /* UPDATE PORTFOLIO PAGE */
    function updatePortfoliopage($heading, $sub, $text, $id)
    {
        if (!$this->setHeading($heading)) {
            return false;
        }
        if (!$this->setSub($sub)) {
            return false;
        }
        if (!$this->setText($text)) {
            return false;
        }
        if (!$this->setId($id)) {
            return false;
        }

        $sql =  "UPDATE portfolio_page SET heading = '" . $heading . "', sub = '" . $sub . "' , text = '" . $text . "' WHERE id = " . $id . ";";
        return $result = $this->db->query($sql);
    }

    /* DELETE SELECTED PORTFOLIO PAGE */

    public function deletePortfoliopage($id)
    {
        $sql = "DELETE FROM portfolio_page WHERE id = " . $id . ";";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    /* SETTERS */

    public function setHeading($heading)
    {
        if ($heading != "") {
            $this->heading = $this->db->real_escape_string($heading);
            return true;
        } else {
            return false;
        }
    }
    public function setSub($sub)
    {
        if ($sub != "") {
            $this->sub = $this->db->real_escape_string($sub);
            return true;
        } else {
            return false;
        }
    }
    public function setText($text)
    {
        if ($text != "") {
            $this->text = $this->db->real_escape_string($text);
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
