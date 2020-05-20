<?php
$domain = $_SERVER['HTTP_HOST'];

//Making the API call from client
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://localhost/api/server/?domain=$domain",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "Accept: */*",
    "Accept-Encoding: gzip, deflate",
    "Cache-Control: no-cache",
    "Connection: keep-alive",
    "cache-control: no-cache"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} 
else 
{
	if($response=="valid")
	{
  		header("location:https://google.com");
	}
	else
	{
		echo "Please purchase a license for domain : ".$domain;
	}
}
?>
