<?php

function post($Url, $Parameters){
	try{
		$Headers[] = "Content-Type:application/json";

		$ch = curl_init();

		curl_setopt( $ch, CURLOPT_URL, $Url );
		curl_setopt( $ch, CURLOPT_POST, true );
		curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
		curl_setopt( $ch, CURLOPT_HTTPHEADER, $Headers );
		curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $Parameters ) );

		if ( curl_errno( $ch ) ){
			return curl_exec( $ch );
		}else{
			return curl_exec( $ch );
		}

		curl_close( $ch );
	}catch(Exception $e){
		echo $e;
		return $e;
	}
}

	// pak arif
	echo "Pak Arif <br/>";

	$items = array();
  
    $item = array(
		"item_id" => "01026B",
		"qty"=>2,
		"price"=> 150000, 
		"total"=> 300000
	);
    array_push($items,$item);
    
    $data = array(
        "signature_key" => "9da621c339fe8096e5d12442b6fe3246",
        "payment_type" => "echanne",
        "gross_amount" => "300000",
        "items" => $items
    );

    // skrip simpan
	$response = post("http://recruitment.api.makekimia.network/api/sales/insert", $data);
	echo $response;
?>
