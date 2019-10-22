<?php
if($request[0] === "portfolio_page"){ 
    $heading = $input['heading'];
    $sub = $input['sub'];
    $text = $input['text'];
  
switch ($method){
    case "GET":
    if(isset($request[1])){
     $portPage->getPortfoliopage($id);
        }else {
          $portPage->getPortfoliopageNoId();
        }
        break;   
    case "PUT": 
$portPage->updatePortfoliopage($heading,$sub, $text, $id);
    	break;
	case "POST":
	$portPage->addPortfoliopage($heading,$sub, $text);
		break;

	case "DELETE":
    $portPage->deletePortfoliopage($id);
   		break; 
}
/* GET TABLE FROM DATABASE, PUSH TO ARRAY AND ECHO ENCODE JSON */
    $jsonArray = [];

    if(isset($request[1])){
        $listPortfoliopage = $portPage->getPortfoliopage($id);
        foreach ($listPortfoliopage as $row) {
            $row_arr['Id'] = $row['id'];
            $row_arr['Heading'] = $row['heading'];
            $row_arr['Sub'] = $row['sub'];
            $row_arr['Text'] = $row['text'];
            array_push($jsonArray,$row_arr);
        }
        }else {
            $listPortfoliopage = $portPage->getPortfoliopageNoId();
            foreach ($listPortfoliopage as $row) {
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