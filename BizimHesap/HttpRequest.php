<?php 

Class HttpRequest
{

	public function sendRequest($url, $options = array())
	{

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);

		if (!isset($options['type'])) {
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST'); 
		}else{
			curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $options['type']); 
		}

		if (isset($options['data'])) {
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($options['data']));
		}

		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
		curl_setopt($ch, CURLOPT_HEADER, false);
  
		$response = curl_exec($ch);
		curl_close($ch);

		return json_decode($response, true);
	}

}
