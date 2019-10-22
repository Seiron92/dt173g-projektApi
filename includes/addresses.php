<?php
if($request[0] === "address"){ 
    $street = $input['street'];
    $postal = $input['postal'];
    $city = $input['city'];
    $phone = $input['phone'];

  
switch ($method){
    case "GET":
    if(isset($request[1])){
     $add->getAddress($id);
        }else {
          $add->getAddressNoId();
        }
        break;   
    case "PUT": 
$add->updateAddress($street,$postal, $city, $phone ,$id);
    	break;
	case "POST":
	$add->addAddress($street,$postal, $city, $phone);
		break;

	case "DELETE":
    $add->deleteAddress($id);
   		break; 
}
/* GET TABLE FROM DATABASE, PUSH TO ARRAY AND ECHO ENCODE JSON */
    $jsonArray = [];

    if(isset($request[1])){
        $listaddress = $add->getAddress($id);
        foreach ($listaddress as $row) {
            $row_arr['Id'] = $row['id'];
            $row_arr['Street'] = $row['street'];
            $row_arr['Postal'] = $row['postal'];
            $row_arr['City'] = $row['city'];
            $row_arr['Phone'] = $row['phone'];
            array_push($jsonArray,$row_arr);
        }
        }else {
            $listaddress = $add->getAddressNoId();
            foreach ($listaddress as $row) {
                $row_arr['Id'] = $row['id'];
                $row_arr['Street'] = $row['street'];
                $row_arr['Postal'] = $row['postal'];
                $row_arr['City'] = $row['city'];
                $row_arr['Phone'] = $row['phone'];
                array_push($jsonArray,$row_arr);
        } 
            }
            echo json_encode($jsonArray, JSON_PRETTY_PRINT);
        }
    ?>