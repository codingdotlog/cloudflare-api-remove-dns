<?php
$zoneID = "";
$APIToken = "";
$curl = curl_init();
curl_setopt_array($curl, [
	CURLOPT_URL => "https://api.cloudflare.com/client/v4/zones/$zoneID/dns_records",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_ENCODING => "",
	CURLOPT_MAXREDIRS => 10,
	CURLOPT_TIMEOUT => 30,
	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
	CURLOPT_CUSTOMREQUEST => "GET",
	CURLOPT_HTTPHEADER => [
		"Content-Type: application/json",
		'X-Auth-Email: l',
		'Authorization: Bearer '.$APIToken,
		'per_page: 200',
	],
]);
$response = curl_exec($curl);
$err = curl_error($curl);
curl_close($curl);
$data = json_decode($response);
foreach ($data->result as $item) {
    echo $item->id;
    $curl = curl_init();
    curl_setopt_array($curl, [
		CURLOPT_URL => "https://api.cloudflare.com/client/v4/zones/$zoneID/dns_records/$item->id",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "DELETE",
		CURLOPT_HTTPHEADER => [
			"Content-Type: application/json",
			'X-Auth-Email: l',
			'Authorization: Bearer '.$APIToken,
		],
    ]);
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);
}
