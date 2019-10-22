<?php

if($request[0] === "program"){ 
    $todate = $input['todate'];
$fromdate = $input['fromdate'];
$program = $input['program'];
$col = $input['col'];
$webpage = $input['webpage'];
$type = $input['type'];
switch ($method){
    case "GET":
    if(isset($request[1])){
     $program2->getProgram($id);
        }else {
          $program2->getProgramNoId();
        }
        break;   
    case "PUT": 
$program2->updateProgram($todate, $fromdate, $program, $col, $webpage, $type, $id);
    	break;
	case "POST":
	$program2->addProgram($todate, $fromdate, $program, $col, $webpage, $type);
		break;

	case "DELETE":
    $program2->deleteProgram($id);
   		break; 
}
/* GET TABLE FROM DATABASE, PUSH TO ARRAY AND ECHO ENCODE JSON */
    $jsonArray = [];

    if(isset($request[1])){
        $listProgram = $program2->getProgram($id);
        foreach ($listProgram as $row) {
            $row_arr['Id'] = $row['id'];
            $row_arr['ToDate'] = $row['todate'];
            $row_arr['FromDate'] = $row['fromdate'];
            $row_arr['Program'] = $row['program'];
            $row_arr['Col'] = $row['col'];
            $row_arr['Webpage'] = $row['webpage'];
            $row_arr['Type'] = $row['type'];
            array_push($jsonArray,$row_arr);
        }
        }else {
            $listProgram = $program2->getProgramNoId();
            foreach ($listProgram as $row) {
                $row_arr['Id'] = $row['id'];
                $row_arr['ToDate'] = $row['todate'];
                $row_arr['FromDate'] = $row['fromdate'];
                $row_arr['Program'] = $row['program'];
                $row_arr['Col'] = $row['col'];
                $row_arr['Webpage'] = $row['webpage'];
                $row_arr['Type'] = $row['type'];
                array_push($jsonArray,$row_arr);
        } 
            }
            echo json_encode($jsonArray, JSON_PRETTY_PRINT);
        }
    ?>