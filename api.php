<?php
// Send return header information
header("Content-Type: application/json; charset=UTF-8");
header('Access-Control-Allow-Origin: http://localhost'); /*  https://www.example.com */
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
// Include configuration to Database
include("includes/config/config.php");
// Include "CRUD"-classes
include("includes/classes/addProgram.php");
include("includes/classes/addWork.php");
include("includes/classes/addWebsite.php");
include("includes/classes/addGraphics.php");
include("includes/classes/addContact.php");
include("includes/classes/addAddress.php");
include("includes/classes/addLanguage.php");
include("includes/classes/addTools.php");
include("includes/classes/addStartpage.php");
include("includes/classes/addContactPage.php");
include("includes/classes/addPortfolioPage.php");

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'),true);
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));

// TEST PUT : {"code":"Test","name":"Test", "prog":"B",  "course_syllabus": "Test"}

// Declare new instace of class
$program2 = new Program();
$work = new Work();
$website = new Website();
$graphic = new Graphic();
$contact = new Contact();
$add = new Address();
$lang = new Language();
$tools = new Tools();
$start = new Startpage();
$portPage = new PortfolioPage();
$contPage = new ContactPage();

// Controll end-point of URL, if it contains anything after pathinfo
// take it as Id, else make Id an empty string.
if(isset($request[1])){
$id = $request[1];
}else {
    $id = '';
}
// Include "URL-controll" based on keyword
// (Contains instructions based on actions)
include('includes/program.php');
include('includes/work.php');
include('includes/webpages.php');
include('includes/graphics.php');
include('includes/contact.php');
include('includes/addresses.php');
include('includes/language.php');
include('includes/tools.php');
include('includes/startpage.php');
include('includes/portfolioPage.php');
include('includes/contactPage.php');
