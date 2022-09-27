<?php 
echo "[!] Tools ini berfungsi untuk mengambil detail sebuah item pada marketplace Blibli.com \n";
echo "[*] Output berupa file JSON.\n\n";
echo "[?] Submit link BliBli.com :\n";
$data = trim(fgets(STDIN));

$kata = explode('/p/', $data);
$pecah = explode("/", $kata[1]);
$pecahLagi = explode("?", $pecah[1]);
$isi = $pecahLagi[0];
getItems($isi);

function getItems($isi){
$body = "https://www.blibli.com/backend/product-detail/products/".$isi."/_summary?defaultItemSku=&pickupPointCode=&cnc=false";
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $body);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


$headers = array();
$headers[] = 'Host: www.blibli.com';
$headers[] = 'User-Agent: Mozilla/5.0 (Windows NT 6.2) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.54 Safari/537.36';
$headers[] = 'Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,*/*;q=0.8';
$headers[] = 'Accept-Language: id,en-US;q=0.7,en;q=0.3';
//$headers[] = 'Accept-Encoding: gzip, deflate';
$headers[] = 'Upgrade-Insecure-Requests: 1';
$headers[] = 'Sec-Fetch-Dest: document';
$headers[] = 'Sec-Fetch-Mode: navigate';
$headers[] = 'Sec-Fetch-Site: none';
$headers[] = 'Sec-Fetch-User: ?1';
$headers[] = 'Connection: close';
$headers[] = 'Cookie: _abck=33D755AF8D12FBDF4BE4D9A3DB8DAB4C~-1~YAAQlegyFzFWMWmDAQAAK6XWgAj3+usK4Qr7X8NrQi1HMYaw7TSyCA/33Aulnt5BcDLgE6Ced++dcGqr3RomelTIEjNQ/Vlopa4h0VEFm15OMrDKG98pPTclblx4JUvXWIE3+b23nDumkRGVLZjFS1AHDFKkxE5sXSAVpgLObzpbpBpBaOGvSG4eCqmqq+Mf7/LrWmYbSUTOxFFRVteKobi/U4szJhkfUexRGziKYO05Hoirq5iSuSrbzNFwENaYQzGUi3qrbJDCzFIYkOpA6AddikxO3gXkUeSnI1XeyHZwtgHGo4JgoroJtOYtNqQAbnzn4dpH44+ApbNbNwKD6PcHujPX0LyzmobZYWjXO8Scabnbtc1dZxFFtOVOvvieu+h0YhVg6qoKixDmRSalg6+Kn4AChCAK~0~-1~-1; Blibli-Device-Id=U.410bcded-fc2d-4c4b-8f75-cc00f3f9cb41; Blibli-Device-Id-Signature=bd06b85a5f0906f172251c6333065a058d758883; _ga_G3ZP2F3MW9=GS1.1.1664311570.4.0.1664311570.60.0.0; _ga=GA1.1.430175937.1653204149; __bwa_user_id=657116261.U.1865960884965371.1653204149; __bwa_user_session_sequence=6; Blibli-User-Id=29d0aa33-0a01-4456-8295-b1b5d1b18ab6; Blibli-Is-Member=false; Blibli-Is-Remember=false; Blibli-Session-Id=5c838505-2f4a-41bb-b925-aaeff693a3a3; Blibli-Signature=53a427f18199eac00217bce9a00331dc022aa07d; _gcl_au=1.1.1435252876.1664294214; _tt_enable_cookie=1; _ttp=ec81e3bc-2eae-44ec-956c-1a4d35c247f4; _gid=GA1.2.494665374.1664294216; moe_uuid=54e231db-dbd8-4b1e-9405-357a9ae311d8; _vwo_uuid_v2=D59C8624C7CD727B6A0C8E8A63F71EDBF|82324c16d9fef705e06422adcb0be346; cto_bundle=U1YQ4l8zQWlKMEhsaSUyQmdSNnlOJTJGY0V6OHM1Q0RoRG8wcEdGbmFoV1dCbkdrSUgxRGxxTDFaNU4yJTJCdmlaSDlLYlpoVkZjTTZNRTR2NDhERlFwNE4zWGVjajIybzE0R2VFVmR4NEdHcGhnSTZaN2tPdnJ6RXIzS0l0bUFhbjJ1eGxqQkU5RGc2dUV2JTJCWFJ4cDVFZTNQQzlFcFVjZyUzRCUzRA; _s=amp-j7uSEG67PKAsT0TxUJxe-w; __auc=amp-aFf4VgjAhexGSEFyAog2Gg; ak_bmsc=688716DF965507A8ADEC97D994BEC011~000000000000000000000000000000~YAAQlegyFzJWMWmDAQAAK6XWgBETI2GLJOPlepHdr+tBqGR6LTp0zq8GecXz3USH6yFmQSGGbCNcOUrEsWFrVD9zX0Y40Z/TbRsldwxIi/bmHa3nm9/0CV68DSkq0LaYaoIrDmHJCfZSzvhsY5PmlPj+IXNe3lVPFw873gcFzRbCrJwPvIYCbowF0Ov+5FuVxoioaSeRUvuosdADALjpJyz+n7LwXrPxq2KSnJaVIchbo+BsSatm3iDYkxATNDMzHYDopI0k/wCW+NVcGFazQIwF8oW5u/4aAFhlE2u92jROFd8m6TUx9klS14vY/IskcUW8NW1sW0ZLPFuxcoxxGrey4YcmzuZlU1Qcx4wZt9PqU4k/S7trhOGpbA==; bm_sz=7F2F170B5D7D66AB175F9A59B5B3754A~YAAQlegyFzNWMWmDAQAAK6XWgBGpZAhkXInWrOmDlzp5/K7mHwiyhun/LT5TE5jZQgyJwviaugSVuQGTk82uWFW3mTX9g7j4k5PuqS0Uz8FhoWQGAwcqwv+c79+ze9Pj57IfpaVnTrghWRBEeTFlUoB5guvoy2f6+4eX6AXdzlihx47gj44bFLshX/Ht5C3yO/FtheRzcjhtlOxAcaTlHzFD847m6GE9uAVlrfRfPUh5aNcc03gdn6aK41LsyyFmtYqUAQ8r6mrx8n+jrrBbK65dEBErMzc8AxIKLgJtMZv0hPA=~3228209~3487027; bm_sv=66752C2AFCC68AF33477137004F8E6AD~YAAQlegyF2FYMWmDAQAATdDWgBHAN2lWzpR4bV8Y+C1kXnWZFySExhwgPc2VFpBGES2XicTsc6I46rdJ8e5+nPP/Zfmxwx2mfQI9sk22seSvi2sHlfbf91SX5QGF61J4omQs3kaDepCcxMcOwGzs9hELQP2MnLsEsX1Z2NXF+6t+ZANwzK1ujJaxOPtTOn8v67kPXVTMgDT/GPWTnxrr5TuE33n53sYPFsmuoK69Zl1u4walVoBiYA7iBlBoXknv~1';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);
echo("Tunggu sebentar .. \n");
sleep(2);
$file = fopen("result.json", "a+") or die;
$isi = "$result";
$isi .= "\n";
fwrite($file, $isi);
fclose($file);
echo("File berhasil di simpan pada file bernama result.json \n");
curl_close($ch);
}

?>
