<?php

namespace App\Libraries;

class Curl_lib
{

	

	public function get($url, $token = null)
	{  
		 $curl = curl_init();
		$headers = array(
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_URL => $url,
		);

		if (!is_null($token)) {
			$headers[CURLOPT_HTTPHEADER] = ['Authorization: Bearer ' . $token];
		}
		// print_r($headers); exit;
		

	
		$curl = curl_init();
		
		curl_setopt_array($curl, $headers);
		$response = curl_exec($curl);
		curl_close($curl);
		return $response;
	}


	public function post($url, $values, $token = null)
	{

		// dd($token);
		$curl = curl_init();

		if (is_null($token)) {
			curl_setopt_array($curl, array(
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL => $url,
				CURLOPT_POST => 1,
				CURLOPT_POSTFIELDS => $values,
			));
		} else {
			curl_setopt_array($curl, array(
				CURLOPT_RETURNTRANSFER => 1,
				CURLOPT_URL => $url,
				CURLOPT_POST => 1,
				CURLOPT_POSTFIELDS => $values,				
				CURLOPT_HTTPHEADER => array(
					'Authorization: Bearer ' . $token
				  ),				 
			));
		}
	
		$response = curl_exec($curl);
		curl_close($curl);
		return $response;
		  
	}
	
}
