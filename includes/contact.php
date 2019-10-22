<?php
if($request[0] === "contact"){ 
   $facebook = $input['facebook'];
    $linkedin = $input['linkedin'];
  
switch ($method){
    case "GET":
    if(isset($request[1])){
     $contact->getContact($id);
        }else {
          $contact->getContactNoId();
        }
        break;   
    case "PUT": 
$contact->updateContact($facebook,$linkedin, $id);
    	break;
	case "POST":
	$contact->addContact($facebook,$linkedin);
		break;

	case "DELETE":
    $contact->deleteContact($id);
   		break; 
}
/* GET TABLE FROM DATABASE, PUSH TO ARRAY AND ECHO ENCODE JSON */
    $jsonArray = [];

    if(isset($request[1])){
        $listcontact = $contact->getContact($id);
        foreach ($listcontact as $row) {
            $row_arr['Id'] = $row['id'];
            $row_arr['Facebook'] = $row['facebook'];
            $row_arr['Linkedin'] = $row['linkedin'];
            array_push($jsonArray,$row_arr);
        }
        }else {
            $listcontact = $contact->getContactNoId();
            foreach ($listcontact as $row) {
                $row_arr['Id'] = $row['id'];
                $row_arr['Facebook'] = $row['facebook'];
                $row_arr['Linkedin'] = $row['linkedin'];
                array_push($jsonArray,$row_arr);
        } 
            }
            echo json_encode($jsonArray, JSON_PRETTY_PRINT);
        }
    ?>