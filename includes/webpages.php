<?php
if($request[0] === "webpages"){ 
   $title = $input['title'];
    $address = $input['address'];
    $cases = $input['cases'];
    $finished = $input['finished'];
    $image = $input['image']; 
switch ($method){
    case "GET":
    if(isset($request[1])){
     $website->getWebsite($id);
        }else {
          $website->getWebsiteNoId();
        }
        break;   
    case "PUT": 
$website->updateWebsite($title,$address, $finished, $cases, $image, $id);
    	break;
	case "POST":
	$website->addWebsite($title,$address, $finished, $cases, $image);
		break;

	case "DELETE":
    $website->deleteWebsite($id);
   		break; 
}
/* GET TABLE FROM DATABASE, PUSH TO ARRAY AND ECHO ENCODE JSON */
    $jsonArray = [];

    if(isset($request[1])){
        $listwebsite = $website->getWebsite($id);
        foreach ($listwebsite as $row) {
            $row_arr['Id'] = $row['id'];
            $row_arr['Title'] = $row['title'];
            $row_arr['Address'] = $row['address'];
            $row_arr['Finished'] = $row['finished'];
            $row_arr['Cases'] = $row['cases'];
            $row_arr['Image'] = $row['image'];
            array_push($jsonArray,$row_arr);
        }
        }else {
            $listwebsite = $website->getWebsiteNoId();
            foreach ($listwebsite as $row) {
                $row_arr['Id'] = $row['id'];
                $row_arr['Title'] = $row['title'];
                $row_arr['Address'] = $row['address'];
                $row_arr['Finished'] = $row['finished'];
                $row_arr['Cases'] = $row['cases'];
                $row_arr['Image'] = $row['image'];
                array_push($jsonArray,$row_arr);
        } 
            }
            echo json_encode($jsonArray, JSON_PRETTY_PRINT);
        }
    ?>