<?php
if($request[0] === "contact_page"){ 
    $heading = $input['heading'];
    $sub = $input['sub'];
    $text = $input['text'];
  
switch ($method){
    case "GET":
    if(isset($request[1])){
     $contPage->getContactpage($id);
        }else {
          $contPage->getContactpageNoId();
        }
        break;   
    case "PUT": 
$contPage->updateContactpage($heading,$sub, $text, $id);
    	break;
	case "POST":
	$contPage->addContactpage($heading,$sub, $text);
		break;

	case "DELETE":
    $contPage->deleteContactpage($id);
   		break; 
}
/* GET TABLE FROM DATABASE, PUSH TO ARRAY AND ECHO ENCODE JSON */
    $jsonArray = [];

    if(isset($request[1])){
        $listContactpage = $contPage->getContactpage($id);
        foreach ($listContactpage as $row) {
            $row_arr['Id'] = $row['id'];
            $row_arr['Heading'] = $row['heading'];
            $row_arr['Sub'] = $row['sub'];
            $row_arr['Text'] = $row['text'];
            array_push($jsonArray,$row_arr);
        }
        }else {
            $listContactpage = $contPage->getContactpageNoId();
            foreach ($listContactpage as $row) {
                $row_arr['Id'] = $row['id'];
                $row_arr['Heading'] = $row['heading'];
                $row_arr['Sub'] = $row['sub'];
                $row_arr['Text'] = $row['text'];
                array_push($jsonArray,$row_arr);
        } 
            }
            echo json_encode($jsonArray, JSON_PRETTY_PRINT);
        }
    ?>