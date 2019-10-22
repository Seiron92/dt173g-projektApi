<?php
if($request[0] === "languages"){ 
    $language = $input['language'];
    $skills = $input['skills'];

  
switch ($method){
    case "GET":
    if(isset($request[1])){
     $lang->getLanguage($id);
        }else {
          $lang->getLanguageNoId();
        }
        break;   
    case "PUT": 
$lang->updateLanguage($language,$skills,$id);
    	break;
	case "POST":
	$lang->addLanguage($language,$skills);
		break;

	case "DELETE":
    $lang->deleteLanguage($id);
   		break; 
}
/* GET TABLE FROM DATABASE, PUSH TO ARRAY AND ECHO ENCODE JSON */
    $jsonArray = [];

    if(isset($request[1])){
        $listlanguage = $lang->getLanguage($id);
        foreach ($listlanguage as $row) {
            $row_arr['Id'] = $row['id'];
            $row_arr['Language'] = $row['language'];
            $row_arr['Skills'] = $row['skills'];
            array_push($jsonArray,$row_arr);
        }
        }else {
            $listlanguage = $lang->getLanguageNoId();
            foreach ($listlanguage as $row) {
                $row_arr['Id'] = $row['id'];
                $row_arr['Language'] = $row['language'];
                $row_arr['Skills'] = $row['skills'];
                array_push($jsonArray,$row_arr);
        } 
            }
            echo json_encode($jsonArray, JSON_PRETTY_PRINT);
        }
    ?>