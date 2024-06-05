<?php
function enc($data){
    $method = "AES-256-CBC";
    $key = "encryptionKey123";
    $options = 0;
    $iv = '1234567891011121';
    
    $encryptedData = openssl_encrypt($data, $method, $key, $options, $iv);
    return $encryptedData;
}

function dcr($data){
    $method = "AES-256-CBC";
    $key = "encryptionKey123";
    $options = 0;
    $iv = '1234567891011121';
    
    $decryptedData = openssl_decrypt($data, $method, $key, $options, $iv);
    return $decryptedData;

}
?>
