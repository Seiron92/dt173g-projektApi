<?php
header("Content-Type: application/json; charset=UTF-8");
include("includes/config/config.php");
include("includes/classes/addCourse.php");

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'),true);
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
if($request[0] != "api"){ 
	http_response_code(404);
	exit();
}
// TEST PUT : {"code":"Test","name":"Test", "prog":"B",  "course_syllabus": "Test"}
// Send return header information
header("Content-Type: application/json; charset=iso-8859-1");
header("Access-Control-Allow-Origin: *");
$course = new Courses();
if(isset($request[1])){
$id = $request[1];
}else {
    $id = '';
}
$code = $input['code'];
$prog = $input['prog'];
$name = $input['name'];
$sylla = $input['course_syllabus'];

switch ($method){
    case "GET":
    if(isset($request[1])){
        $courses = $course->getCourses($id);
        }else {
            $courses = $course->getCoursesNoId();
        }
        break;   
    case "PUT": 
$course->updateCourse($code, $name, $prog, $sylla, $id);
    	break;
	case "POST":
	$course->addCourse($code, $name, $prog, $sylla);
		break;

	case "DELETE":
    $course->deleteCourse($id);
   		break; 
}
/* GET TABLE FROM DATABASE, PUSH TO ARRAY AND ECHO ENCODE JSON */
    $jsonArray = [];

    if(isset($request[1])){
        $listCourses = $course->getCourses($id);
        foreach ($listCourses as $row) {
            $row_arr['Id'] = $row['id'];
            $row_arr['Code'] = $row['code'];
            $row_arr['Name'] = $row['name'];
            $row_arr['Progression'] = $row['prog'];
            $row_arr['Course_syllabus'] = $row['course_syllabus'];
            array_push($jsonArray,$row_arr);
        }
        }else {
            $listCourses = $course->getCoursesNoId();
            foreach ($listCourses as $row) {
                $row_arr['Id'] = $row['id'];
                $row_arr['Code'] = $row['code'];
                $row_arr['Name'] = $row['name'];
                $row_arr['Progression'] = $row['prog'];
                $row_arr['Course_syllabus'] = $row['course_syllabus'];
                array_push($jsonArray,$row_arr);
        } 
            }
            echo json_encode($jsonArray, JSON_PRETTY_PRINT);
