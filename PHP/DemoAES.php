<?php
$i=$_POST["data"];
$i=str_replace(" ", "+", $i);

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
$data = explode("*---*", $decryptedString);
//var_dump($data);
$opt= explode(",", $data[0]);
$url=$opt[0];
$mth=$opt[1];
$crd=$opt[2];
echo "$url";
echo "\n";
echo "$mth";
echo "\n";
echo "$crd";
echo "\n";
echo "$data[1]";

echo "--------------------------------------------";
$request = new HttpRequest();
$request->setUrl($url);
$request->setMethod(HTTP_METH_POST);
$request->setHeaders(array(
  'cache-control' => 'no-cache',
  'authorization' => $crd,
  'content-type' => 'application/json'
));
$request->setBody($data[1]);
$res="";
try {
  $response = $request->send();
  $res=$response->getBody();
} catch (HttpException $ex) {
  $res=$ex;
}
echo "$res";



















//echo "Available methods: " . implode(",", $aes->getAvailableMethods()) . "<br/><br/>" . PHP_EOL;
//echo "IV string: " . $ivString . "<br/>" . PHP_EOL;
//echo "Encrypted string: " . $encryptedString . "<br/>" . PHP_EOL;
//echo "Decrypted string: " . $decryptedString . "<br/>" . PHP_EOL;
