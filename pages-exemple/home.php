<body>
 <div class="entete">
     <div class="presentation">
         <h1>RECHARGES MOBILES</h1>
     </div>
 </div>
 <div class="content"></div>
</body>
<?php 
require(dirname(__FILE__) . '/../vendor/autoload.php'); 

use Panda\Mobiletopup\DBSQL;
use Panda\Mobiletopup\Token;
use Panda\Mobiletopup\countries;
use Panda\Mobiletopup\citiesByMe;
use Panda\Mobiletopup\Gift_cards;
use Panda\Mobiletopup\iatacodesByMe;
use Panda\Mobiletopup\mobiletopupSDK;
use Panda\Mobiletopup\travelsPayoutsByMe;
use Google\Cloud\Firestore\FirestoreClient;

$iatas=new iatacodesByMe();
$hostelLocation=new travelsPayoutsByMe();
$flightsearch=new travelsPayoutsByMe();
$aeroportsInfo=new travelsPayoutsByMe();
$cities=new citiesByMe();
$transanction=new mobiletopupSDK();
//$token=new Token();
$gift_card=new Gift_cards();
$connection=new DBSQL();
$countries=$connection->DB_COUNTRIE_DETAILS_SEARCH_BY_ISO("FR");
//echo $connection->countryName;
$transanction->GET_FROM_RELOADLY_OPERATOR_DETAILS("933");
echo json_encode($transanction->rate);
 //$connection->DB_TOKEN_RELOADLY_CLIENT_ID_SECRET();

//echo $connection->client_id;
$curl = curl_init();

/*curl_setopt_array($curl, array(
CURLOPT_URL => 'https://auth.reloadly.com/oauth/token',
CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => '',
CURLOPT_MAXREDIRS => 10,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => true,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => 'POST',
CURLOPT_POSTFIELDS =>'{
  "client_id":'$connection->client_id',
  "client_secret":'$connection->client_secret',
"grant_type":"client_credentials",
"audience":"https://giftcards.reloadly.com"
}',
CURLOPT_HTTPHEADER => array(
  'Content-Type: application/json'
),
));



curl_setopt($curl,CURLOPT_URL , 'https://auth.reloadly.com/oauth/token');
curl_setopt($curl,CURLOPT_RETURNTRANSFER , true);
curl_setopt($curl,CURLOPT_ENCODING , '');
curl_setopt($curl,CURLOPT_MAXREDIRS , 10);
curl_setopt($curl,CURLOPT_TIMEOUT , 0);

curl_setopt($curl,CURLOPT_FOLLOWLOCATION , true);
curl_setopt($curl,CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST , 'POST');
curl_setopt($curl,CURLOPT_POSTFIELDS ,"{
    \"client_id\":\"$connection->client_id\",
    \"client_secret\":\"$connection->client_secret\",
  \"grant_type\":\"client_credentials\",
  \"audience\":\"https://giftcards.reloadly.com\"
  }");
  curl_setopt($curl,CURLOPT_HTTPHEADER , array(
    'Content-Type: application/json'
  ));
  $response = curl_exec($curl);

curl_close($curl);
echo $response;*/
$operator = new mobiletopupSDK();
$content_ = $operator->GET_ALL_OPERATORS_();
//echo '<div>'. $content_;
$value_ = json_decode($content_, true);

for ($i = 0; $i < count($value_['content']); $i++) {
  //echo '<div>'. echo '<div>'. $value_['content'][$i]['id'];
}
          foreach ($value_['content'] as $key => $value) {
                                  echo '<tr>';
                                  echo '<td>' . $value['id'] . '</td><br>';
                                  echo '<td>' . $value['name'] . '</td><br>';
                                  echo '<td>' . $value['bundle'] . '</td><br>';
                                  echo '<td>' . $value['data'] . '</td><br>';
                                  echo '<td>' . $value['pin'] . '</td><br>';
                                  echo '<td>' . $value['supportsLocalAmounts'] . '</td><br>';
                                  echo '<td>' . $value['supportsGeographicalRechargePlans'] . '</td><br>';
                                 
                                  echo '<td>' . $value['denominationType'] . '</td><br>';
                                  echo '<td>' . $value['senderCurrencyCode'] . '</td><br>';
                                  echo '<td>' . $value['senderCurrencySymbol'] . '</td><br>';
                                  echo '<td>' . $value['destinationCurrencyCode'] . '</td><br>';
                                  echo '<td>' . $value['destinationCurrencySymbol'] . '</td><br>';
                                  echo '<td>' . $value['commission'] . '</td><br>';
                                  echo '<td>' . $value['internationalDiscount'] . '</td><br>';
                                  echo '<td>' . $value['localDiscount'] . '</td><br>';
                                  echo '<td>' . $value['mostPopularAmount'] . '</td><br>';
                                  echo '<td>' . $value['mostPopularLocalAmount'] . '</td><br>';
                                  echo '<td>' . $value['minAmount'] . '</td><br>';
                                  echo '<td>' . $value['maxAmount'] . '</td><br>';
                                  echo '<td>' . $value['localMinAmount'] . '</td><br>';
                                  echo '<td>' . $value['localMaxAmount'] . '</td><br>';
                                  echo '<td>' . $value['country']['isoName'] . '</td><br>';
                                  echo '<td>' . $value['country']['name'] . '</td><br>';
                                  echo '<td>rate:>>' . $value['fx']['rate'] . '</td><br>';
                                  echo '<td>' . $value['fx']['currencyCode'] . '</td><br>';
                                  for ($i = 0; $i < count($value['logoUrls']); $i++) {
                      
                                    //$this->logoUrls=echo '<td>'. $value['logoUrls'][$i].'</td><br>'.'</td><br>';
                                  }
                                  echo '<td>' . '<img src="' . $value['logoUrls'][0] . '"/>' . '</td><br>';
                                  echo '<td>logoUrls:>>'. $value['logoUrls'][0].'</td><br>';
                                  for ($i = 0; $i < count($value['fixedAmounts']); $i++) {
                                    echo '<td>' . $value['fixedAmounts'][$i] . '</td><br>';
                                    echo '<td>fixedAmounts:>>' . $value['fixedAmounts'][$i] . '</td><br>';
                                  }
                                  if ($value['fixedAmountsDescriptions'] !== '') {
                                    for ($i = 0; $i < count($value['fixedAmountsDescriptions']); $i++) {
                                      echo '<td>fixedAmountsDescriptions:>>'. $value['fixedAmountsDescriptions'][$i].'</td><br>';
                                    }
                                  }
                      
                                  for ($i = 0; $i < count($value['localFixedAmounts']); $i++) {
                                    echo '<td>' . $value['localFixedAmounts'][$i] . '</td><br>';
                                  }
                                   for ($i=0; $i < count($value['localFixedAmountsDescriptions']) ; $i++) { 
                              echo '<td>'. $value['localFixedAmountsDescriptions'][$i].'</td><br>';
                             }
                             for ($i = 0; $i < count($value['suggestedAmounts']); $i++) {
                              echo '<td>suggestedAmounts:>>' . $value['suggestedAmounts'][$i] . '</td><br>';
                            }
                             echo '<td>'. '////////////bbbbbbbbbbbbb///'.json_encode($value['suggestedAmountsMap']).'</td><br>';
                            if ($value['suggestedAmountsMap'] !== '') {
                              foreach ($value['suggestedAmountsMap'] as $key => $lvalue) {
                                if ($lvalue !== '') {
                                  echo '<td>' . 'recharge de ' . $key . ' ' . $value['senderCurrencySymbol'] . '=' . $lvalue . ' ' . $value['destinationCurrencySymbol'] . '</td><br>';
                                }
                              }
                            }
                
                            for ($i = 0; $i < count($value['suggestedAmountsMap']); $i++) {
                
                
                              echo '<td>suggestedAmountsMap:>>'. $value['suggestedAmountsMap'][$i].'</td><br>';
                            }
                            for ($i = 0; $i < count($value['geographicalRechargePlans']); $i++) {
                              echo '<td>'. $value['geographicalRechargePlans'][$i].'</td><br>';
                            }
                            for ($i = 0; $i < count($value['promotions']); $i++) {
                               echo '<td>'. $value['promotions'][$i].'</td><br>';
                            }
                            echo '<td>fixedAmounts:>>'. json_encode($value['fixedAmounts']).'</td><br>';
                            echo '<td>fixedAmountsDescriptions:>>'. json_encode($value['fixedAmountsDescriptions']).'</td><br>';
                            echo '<td>localFixedAmounts:>>'. json_encode($value['localFixedAmounts']).'</td><br>';
                            echo '<td>localFixedAmountsDescriptions:>>'. json_encode($value['localFixedAmountsDescriptions']).'</td><br>';
                             echo '<td>suggestedAmounts:>>'. json_encode($value['suggestedAmounts']).'</td><br>';
                            
                            echo '<td>geographicalRechargePlans:>>'. json_encode($value['geographicalRechargePlans']).'</td><br>';
                            echo '<td>'. json_encode($value['promotions']).'</td><br>';
                            echo '</tr>'; 
                          }

                         

                         
?>