<?php
$i=$_POST["data"];
$i=str_replace(" ", "+", $i);
//echo $i;
//require_once('vendor/autoload.php');
include("AES.php");
$aes = new AES();
$aes->setKey("1234567890123456");
$aes->setData($i);
$ivString = "1234567890123456";
$aes->setIv($ivString);

//$encryptedString = $aes->encrypt();
//$aes->setData($encryptedString);
$decryptedString = $aes->decrypt();
//echo $decryptedString;
//echo "----";
$data = explode("*---*", $decryptedString);
$opt= explode(",", $data[0]);
$url=$opt[0];
$mth=$opt[1];
$crd=$opt[2];

if ($mth=="POST") {
//$url= urlencode($url);
$url=str_replace("%3A", ":", $url);
$url=str_replace("%2F", "/", $url);
$url=str_replace("%3F", "?", $url);
$url=str_replace("%24", "$", $url);
$url=str_replace("%3D", "=", $url);




  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => $mth,

    CURLOPT_POSTFIELDS => $data[1],

    CURLOPT_HTTPHEADER => array(
      "authorization: ".$crd,
      "cache-control: no-cache",
      "content-type: application/json",
    ),
  ));
  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    $data=htmlentities($response);
    $data=str_replace("&quot;","\"",$data);
	$aes->setData($data);
	$decryptedString = $aes->encrypt();
    echo $decryptedString;

  }

  // code...
}
else if ($mth=="GET") {
/*$url= urlencode($url);
$url=str_replace("%3A", ":", $url);
$url=str_replace("%2F", "/", $url);
$url=str_replace("%3F", "?", $url);
$url=str_replace("%24", "$", $url);
$url=str_replace("%3D", "=", $url);*/
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => $mth,

    CURLOPT_POSTFIELDS => $data[1],

    CURLOPT_HTTPHEADER => array(
      "authorization: ".$crd,
      "cache-control: no-cache",
      "content-type: application/json",
    ),
  ));
  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    $data=htmlentities($response);
    $data=str_replace("&quot;","\"",$data);
	$aes->setData($data);
	$decryptedString = $aes->encrypt();
    echo $decryptedString;

  }

  // code...
}
else if ($mth=="PATCH") {

/*$url= urlencode($url);
$url=str_replace("%3A", ":", $url);
$url=str_replace("%2F", "/", $url);
$url=str_replace("%3F", "?", $url);
$url=str_replace("%24", "$", $url);
$url=str_replace("%3D", "=", $url);*/
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => $url,
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => $mth,

    CURLOPT_POSTFIELDS => $data[1],

    CURLOPT_HTTPHEADER => array(
      "authorization: ".$crd,
      "cache-control: no-cache",
      "content-type: application/json",
    ),
  ));
  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    $data=htmlentities($response);
    $data=str_replace("&quot;","\"",$data);
	$aes->setData($data);
	$decryptedString = $aes->encrypt();
    echo $decryptedString;
  }

  // code...
}


