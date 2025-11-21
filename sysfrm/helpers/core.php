function encryptUrlParams($params) {
    $key = "your-secret-key"; // Use a strong secret key
    $cipher = "AES-256-CBC";
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = openssl_random_pseudo_bytes($ivlen);
    $encrypted = openssl_encrypt($params, $cipher, $key, 0, $iv);
    return base64_encode($iv . $encrypted);
}

function decryptUrlParams($encryptedParams) {
    $key = "your-secret-key"; // Use the same secret key as encryption
    $cipher = "AES-256-CBC";
    $encryptedData = base64_decode($encryptedParams);
    $ivlen = openssl_cipher_iv_length($cipher);
    $iv = substr($encryptedData, 0, $ivlen);
    $encrypted = substr($encryptedData, $ivlen);
    return openssl_decrypt($encrypted, $cipher, $key, 0, $iv);
} 