<?php
session_start();
$client_id     = "Your client id";
$client_secret = "your client secret";
$redirect_uri  = "enter your redirect url";
$csrf_token    = random_int(1111111111, 9999999999);
$scopes        = "r_basicprofile%20r_emailaddress";

function curl($url, $parameters) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
	curl_setopt($ch, CURLOPT_POST, 1);
	$headers   = [];
	$headers[] = "Content-Type: application/x-www-form-urlencoded";
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$result = curl_exec($ch);
	return $result;
}

function getcallback() {
	$client_id     = "81kzyslgteifjy";
	$client_secret = "iI0IL4EONJFCsQLw";
	$redirect_uri  = $redirecturl;
	$csrf_token    = random_int(1111111111, 9999999999);
	$scopes        = "r_basicprofile";

	if (isset($_REQUEST['code'])) {
		$code   = $_REQUEST['code'];
		$url    = "https://www.linkedin.com/oauth/v2/accessToken";
		$params = [
			'client_id'     => $client_id,
			'client_secret' => $client_secret,
			'redirect_uri'  => $redirect_uri,
			'code'          => $code,
			'grant_type'    => 'authorization_code',

		];
		$accessToken = curl($url, http_build_query($params));

		$accessToken = json_decode($accessToken)->access_token;

		$url  = "https://api.linkedin.com/v1/people/~:(id,firstName,lastName,pictureUrls::(original),headline,publicProfileUrl,location,industry,positions,email-address)?format=json&oauth2_access_token=".$accessToken;
		$user = file_get_contents($url, false);

		return (json_decode($user));
	}

}
?>