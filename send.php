<?php
function getHex($txid) {
  return file_get_contents('https://blockchain.info/tx/' . $txid . '?format=hex');
}
function sendBroadcast($txid) {
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 0,
    CURLOPT_URL => 'https://api.smartbit.com.au/v1/blockchain/pushtx',
    CURLOPT_USERAGENT => 'TXBroadcast',
    CURLOPT_POST => 1,
    CURLOPT_POSTFIELDS => json_encode(array(
        'hex' => getHex($txid)
    ))
));
$resp = curl_exec($curl);
curl_close($curl);
}
sendBroadcast($_GET['tx']);
?>
