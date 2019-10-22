<?php
if($request[0] === "portfolio"){ 
   $title = $input['title'];
    $cases = $input['cases'];
    $image = $input['image']; 
switch ($method){
    case "GET":
    if(isset($request[1])){
     $graphic->getGraphic($id);
        }else {
          $graphic->getGraphicNoId();
        }
        break;   
    case "PUT": 
$graphic->updateGraphic($title, $cases, $image, $id);
    	break;
	case "POST":
	$graphic->addGraphic($title, $cases, $image);
		break;

	case "DELETE":
    $graphic->deleteGraphic($id);
   		break; 
}
/* GET TABLE FROM DATABASE, PUSH TO ARRAY AND ECHO ENCODE JSON */
    $jsonArray = [];

    if(isset($request[1])){
        $listgraphic = $graphic->getGraphic($id);
        foreach ($listgraphic as $row) {
            $row_arr['Id'] = $row['id'];
            $row_arr['Title'] = $row['title'];
            $row_arr['Cases'] = $row['cases'];
            $row_arr['Image'] = $row['image'];
            array_push($jsonArray,$row_arr);
        }
        }else {
            $listgraphic = $graphic->getGraphicNoId();
            foreach ($listgraphic as $row) {
                $row_arr['Id'] = $row['id'];
                $row_arr['Title'] = $row['title'];
                $row_arr['Cases'] = $row['cases'];
                $row_arr['Image'] = $row['image'];
                array_push($jsonArray,$row_arr);
        } 
            }
            echo json_encode($jsonArray, JSON_PRETTY_PRINT);
        }
    ?>