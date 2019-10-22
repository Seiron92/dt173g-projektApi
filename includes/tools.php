<?php
if($request[0] === "tools"){ 
    $tool = $input['tool'];
    $skills = $input['skills'];

  
switch ($method){
    case "GET":
    if(isset($request[1])){
     $tools->getTool($id);
        }else {
          $tools->getToolNoId();
        }
        break;   
    case "PUT": 
$tools->updateTool($tool,$skills,$id);
    	break;
	case "POST":
	$tools->addTool($tool,$skills);
		break;

	case "DELETE":
    $tools->deleteTool($id);
   		break; 
}
/* GET TABLE FROM DATABASE, PUSH TO ARRAY AND ECHO ENCODE JSON */
    $jsonArray = [];

    if(isset($request[1])){
        $listtool = $tools->getTool($id);
        foreach ($listtool as $row) {
            $row_arr['Id'] = $row['id'];
            $row_arr['Tool'] = $row['tool'];
            $row_arr['Skills'] = $row['skills'];
            array_push($jsonArray,$row_arr);
        }
        }else {
            $listtool = $tools->getToolNoId();
            foreach ($listtool as $row) {
                $row_arr['Id'] = $row['id'];
                $row_arr['Tool'] = $row['tool'];
                $row_arr['Skills'] = $row['skills'];
                array_push($jsonArray,$row_arr);
        } 
            }
            echo json_encode($jsonArray, JSON_PRETTY_PRINT);
        }
    ?>