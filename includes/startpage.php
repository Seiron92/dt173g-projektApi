<?php
if($request[0] === "startpage"){ 
    $heading = $input['heading'];
    $sub = $input['sub'];
    $text = $input['text'];
  
switch ($method){
    case "GET":
    if(isset($request[1])){
     $start->getStartpage($id);
        }else {
          $start->getStartpageNoId();
        }
        break;   
    case "PUT": 
$start->updateStartpage($heading,$sub, $text, $id);
    	break;
	case "POST":
	$start->addStartpage($heading,$sub, $text);
		break;

	case "DELETE":
    $start->deleteStartpage($id);
   		break; 
}
/* GET TABLE FROM DATABASE, PUSH TO ARRAY AND ECHO ENCODE JSON */
    $jsonArray = [];

    if(isset($request[1])){
        $listStartpage = $start->getStartpage($id);
        foreach ($listStartpage as $row) {
            $row_arr['Id'] = $row['id'];
            $row_arr['Heading'] = $row['heading'];
            $row_arr['Sub'] = $row['sub'];
            $row_arr['Text'] = $row['text'];
            array_push($jsonArray,$row_arr);
        }
        }else {
            $listStartpage = $start->getStartpageNoId();
            foreach ($listStartpage as $row) {
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