<?php

require(dirname(__FILE__) . '/../vendor/autoload.php'); 

use Panda\Mobiletopup\Gift_cards;
use Panda\Mobiletopup\Token;
//$_POST['countrieiso']="us";
if(isset($_POST['countrieiso'])=="us"){
    
    $token=new Token();
    $gift_card=new Gift_cards();
    $theGift='';
    $theGift= $gift_card->getGift_Product_By_ISO($_POST['countrieiso']);

$json1=json_encode($theGift);
$json2=json_decode($json1, true);
foreach($json2 as $key => $value){
for ($i=0; $i < count($value); $i++) { 
   echo $value[$i];
}
}

}
if (isset($_POST['by_gift_card'])=="by_gift_card") {
    $gift_card=new Gift_cards();
    $theGift='';
    $theGift= $gift_card->BY_GIFT_CARD(
        $_POST['productID'], 
    $_POST['countrycode'], 
    $_POST['quantity'], 
    $_POST['unitprice'], 
    $_POST['identifier'], 
    $_POST['senderName'],
     $_POST['reciepientemail'], 
     $_POST['countrycoder'],
      $_POST['phoneNumber']);
    echo $theGift;
}
/*
https://mes-dev.com/posts/how-to-populate-html-table-using-php-and-ajax
$store = $_POST['store_id'];
    if( isset($store)) { 
        $query = "SELECT * from items WHERE storeId='".$store."'";
        $result = $db->query($query) or die($db->error);
        $content = '';
        While ($row = $result->fetch_array()) {
            $barcode = mysqli_real_escape_string($db,$row['itemBarcode']);
            $name = mysqli_real_escape_string($db,$row['itemName']);
            $unitPrice =$row['itemUnitPrice'];
            $sellingPrice =$row['itemSellingPrice'];
            
            $content .='<tr class="item-row"><td><div class="delete-wpr">'.$barcode.'<a class="delme" href="javascript:;" title="Remove row">X</a></div></td>';
            $content .='<td>'.$name.'</td>';
            $content .='<td align="right">'.number_format($unitPrice,2).' $</td>';
            $content .='<td align="right">'.number_format($sellingPrice,2).' $</td>';
        }
        
            $storeData = array(
                        "content" => $content
                        );
        echo json_encode($storeData);
    }
    */