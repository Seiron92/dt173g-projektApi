<?php
class Courses
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
    function addCourse($code, $name, $prog, $sylla)
    {
        if (!$this->setCode($code)) {
            return false;
        }
        if (!$this->setName($name)) {
            return false;
        }
        if (!$this->setProg($prog)) {
            return false;
        }
        if (!$this->setSylla($sylla)) {
            return false;
        }
  

        $sql = "INSERT INTO courses (code, name, prog, course_syllabus)
        VALUES ('" . $this->code . "', '" . $this->name . "', '" . $this->prog . "', '" . $this->sylla . "')";
        return $result = $this->db->query($sql);
    }
   
    /* GET ALL COURSES */

    public function getCourses($id)
    {
        $sql = "SELECT * FROM courses  WHERE id = " . $id . ";";
        $result = $this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

        /* GET ALL COURSES WITHOUT IN*/

        public function getCoursesNoId()
        {
            $sql = "SELECT * FROM courses ";
            $result = $this->db->query($sql);
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
      /* UPDATE COURSE */
      function updateCourse($code, $name, $prog, $sylla, $id)
      {
        if (!$this->setCode($code)) {
            return false;
        }
        if (!$this->setId($id)) {
            return false;
        }
        if (!$this->setName($name)) {
            return false;
        }
        if (!$this->setProg($prog)) {
            return false;
        }
        if (!$this->setSylla($sylla)) {
            return false;
        }
  
          $sql =  "UPDATE courses  SET code = '" . $code. "', name = '" . $name . "', prog = '" . $prog . "' , course_syllabus = '" . $sylla . "' WHERE id = " . $id . ";";
          return $result = $this->db->query($sql);
      }

      /* DELETE SELECTED COURSE */

      public function deleteCourse($id)
      {
          $sql = "DELETE FROM courses WHERE id = " . $id . ";";
          $result = $this->db->query($sql);
          return mysqli_fetch_all($result, MYSQLI_ASSOC);
      }

    /* SETTERS */

    public function setCode($code)
    {
        if ($code != "") {
            $this->code = $this->db->real_escape_string($code);
            return true;
        } else {
            return false;
        }
    }
    public function setName($name)
    {
        if ($name != "") {
            $this->name = $this->db->real_escape_string($name);
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
    public function setProg($prog)
    {
        if ($prog != "") {
            $this->prog = $this->db->real_escape_string($prog);
            return true;
        } else {
            return false;
        }
    }
    public function setSylla($sylla)
    {
        if ($sylla != "") {
            $this->sylla = $this->db->real_escape_string($sylla);
            return true;
        } else {
            return false;
        }
    }

}