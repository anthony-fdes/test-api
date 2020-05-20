<?php
include 'dbconfig.php';

//Actual logic implementation
$url = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 
                "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .  
                $_SERVER['REQUEST_URI'];

	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		$url_components = parse_url($url);
		parse_str($url_components['query'], $params);
		$domain = $params['domain'];

		$result = $conn->query("SELECT domain_name FROM domains_authorized WHERE domain_name = '$domain'");

			if($result->num_rows == 0) 
			{
     			$validate_domain = "NULL";
			} 
			else 
			{
    			$validate_domain = $domain;
			}
			$conn->close();

		if($domain == $validate_domain)
		{
			echo "valid";
			http_response_code(200);
		}
		else
		{
			echo "Unauthorized Domain";
			http_response_code(400);
		}

	}
	else if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
		echo "Operation not allowed";
		http_response_code(400);
	}
	else
	{
		echo "Operation not allowed";
		http_response_code(400);
	}
?>