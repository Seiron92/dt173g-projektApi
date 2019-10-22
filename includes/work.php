<?php
if($request[0] === "work"){ 
    $todate = $input['todate'];
$fromdate = $input['fromdate'];
$workPlace = $input['work_place'];
$title = $input['title'];
switch ($method){
    case "GET":
    if(isset($request[1])){
     $work->getWork($id);
        }else {
          $work->getWorkNoId();
        }
        break;   
    case "PUT": 
$work->updateWork($todate,$fromdate, $workPlace, $title, $id);
    	break;
	case "POST":
	$work->addWorkPlace($todate,$fromdate, $workPlace, $title);
		break;

	case "DELETE":
    $work->deleteWork($id);
   		break; 
}
/* GET TABLE FROM DATABASE, PUSH TO ARRAY AND ECHO ENCODE JSON */
    $jsonArray = [];

    if(isset($request[1])){
        $listWork = $work->getWork($id);
        foreach ($listWork as $row) {
            $row_arr['Id'] = $row['id'];
            $row_arr['ToDate'] = $row['todate'];
            $row_arr['FromDate'] = $row['fromdate'];
            $row_arr['Work_place'] = $row['work_place'];
            $row_arr['Title'] = $row['title'];
            array_push($jsonArray,$row_arr);
        }
        }else {
            $listWork = $work->getWorkNoId();
            foreach ($listWork as $row) {
                $row_arr['Id'] = $row['id'];
                $row_arr['ToDate'] = $row['todate'];
                $row_arr['FromDate'] = $row['fromdate'];
                $row_arr['Work_place'] = $row['work_place'];
                $row_arr['Title'] = $row['title'];
                array_push($jsonArray,$row_arr);
        } 
            }
            echo json_encode($jsonArray, JSON_PRETTY_PRINT);
        }
    ?>