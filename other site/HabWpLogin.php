<?php
class HabWpLogin
{
	public static function doLogin($data, $url)
	{
		$options = array(
			'http' => array(
				'header' => "Content-type: application/x-www-form-urlencoded\r\n",
				'method' => 'POST',
				'content' => http_build_query($data)
			)
		);
		$context = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		if ($result === FALSE) {
			die("AN ERROR OCCURED");
		}
		$json = json_decode($result, true);
		return $json;
	}
 
}
