<?php

namespace Panda\Mobiletopup;

class DBSQL
{


  /*
  private $USER = "zamba";
  private $PASS = "Diakanua12@";*/

  private $USER = "root";
  private $PASS = "";

  private $DB = "mobiletopup_zambaapple";
  private $SERVER = "localhost";
  public $connection;
  public $insert_Result = array();
  public $result;
  public $username;
  public $password;
  public $id;
  public $status;
  public $token;
  public $date_heure;
  public $name;
  public $lastname;
  public $country;
  public $client_id;
  public $client_secret;
  public $countrieid;
  public $countriephonecode;
  public $countrycodeIso;
  public $countryName;
  public $pageid;
  public $pageurl;
  public $page;
  public $pagehash;
  public $stripeAp;

  public function __construct()
  {
    $this->countrieid;
    $this->countriephonecode;
    $this->countrycodeIso;
    $this->countryName;
    $this->username;
    $this->password;
    $this->token;
    $this->date_heure;
    $this->status;
    $this->id;
    $this->name;
$this->lastname;
    $this->country;
    $this->client_id;
    $this->client_secret;
    $this->pageid;
  $this->pageurl;
   $this->page;
   $this->pagehash;
   $this->stripeAp;
  }

  public function DB_MYSQL_CONNECTION()
  {
    $this->connection = mysqli_connect($this->SERVER, $this->USER, $this->PASS, $this->DB);
    if ($this->connection) {
     // echo "Connection succefully";
    } else {
     // echo "Connection failed";
    }
    return $this->connection;
  }

    /*USER CREAT*/
    public function DB_SELECT_USERNAME_VERIFICATION_ACTIVITIES($username)
  {
    $query = "SELECT * FROM users WHERE username='$username'";

    if ($this->result = mysqli_query($this->DB_MYSQL_CONNECTION(), $query)) {
      while ($values = mysqli_fetch_assoc($this->result)) {
        if ($values['status'] == 0) {        
          $this->insert_Result['deconnection_now']="active";
         // $_SESSION['username'] = $values['username'];
        } else {
          $this->insert_Result =  "ACCOUNT ACTIV";
        }
      }
    } else {
      $this->insert_Result =  "YOUR USERNAME OR PASSWORD!!\n";
    }

    return json_encode($this->insert_Result);
  }
  public function DB_INSERT($username, $password, $country)
  {
    $query = "INSERT INTO users(username, password, country) VALUES ('$username','$password','$country')";

    if (mysqli_query($this->DB_MYSQL_CONNECTION(), $query)) {
     
     $this->insert_Result=$this->DB_SELECT_USER_BY_USERNAME($username);
     // $this->insert_Result = "insert succefully" . mysqli_insert_id($this->DB_MYSQL_CONNECTION());
    } else {
      $this->insert_Result =  "DO NOT INSERT !!\n";
    }

    return  $this->insert_Result;
  }
  public function DB_UPDATE_USERNAME($username, $id)
  {
    $query = "UPDATE users SET username='" . $username . "' WHERE id='" . $id . "'";

    if (mysqli_query($this->DB_MYSQL_CONNECTION(), $query)) {
      // $this->insert_Result = "UPDATE USERNAME succefully";
      $this->insert_Result = $this->DB_SELECT_USER_BY_ID($id);
    } else {
      $this->insert_Result =  "DO NOT UPDATE USERNAME\n";
    }

    return  $this->insert_Result;
  }
  public function DB_UPDATE_PASSWORD($password, $id)
  {
    $query = "UPDATE users SET password='" . $password . "' WHERE id='" . $id . "'";

    if (mysqli_query($this->DB_MYSQL_CONNECTION(), $query)) {
      // $this->insert_Result = "UPDATE PASSWORD succefully";
      $this->insert_Result = $this->DB_SELECT_USER_BY_ID($id);
    } else {
      $this->insert_Result =  "DO NOT UPDATE PASS!!\n";
    }

    return  $this->insert_Result;
  }
  public function DB_UPDATE_STATUS($status, $id)
  {
    $query = "UPDATE users SET status='" . $status . "' WHERE id='" . $id . "'";

    if (mysqli_query($this->DB_MYSQL_CONNECTION(), $query)) {
      // $this->insert_Result = "UPDATE USERNAME succefully";
      $this->insert_Result = $this->DB_SELECT_USER_BY_ID($id);
    } else {
      $this->insert_Result =  "DO NOT UPDATE STATUS\n";
    }

    return  $this->insert_Result;
  }
  public function DB_DELETE_USER($id)
  {
    $query = "DELETE FROM users WHERE id='" . $id . "'";

    if (mysqli_query($this->DB_MYSQL_CONNECTION(), $query)) {
      $this->insert_Result = "DELETE user " . $id . " succefully";
    } else {
      $this->insert_Result =  "DO NOT DELETE USER!!\n";
    }

    return  $this->insert_Result;
  }
  public function DB_SELECT_USER($username, $password)
  {
    session_start();
    $query = "SELECT * FROM users WHERE username='$username' and password='$password'";

    if ($this->result = mysqli_query($this->DB_MYSQL_CONNECTION(), $query)) {
      while ($values = mysqli_fetch_assoc($this->result)) {
        if ($values['username'] == $username || $values['password'] == $password) {
          $this->insert_Result=$this->DB_UPDATE_STATUS('1',$values['id']);;
          
         // header('location:index.php');
         // $_SESSION['username'] = $values['username'];
        } else {
          $this->insert_Result =  "YOUR USERNAME OR PASSWORD!!\n";
        }
      }
    } else {
      $this->insert_Result =  "YOUR USERNAME OR PASSWORD!!\n";
    }

    echo $this->insert_Result;
  }
  public function DB_SELECT_USER_BY_ID_DECONNECT_SYSTEM($id)
  {
    session_start();
    $query = "SELECT * FROM users WHERE username='$id'";

    if ($this->result = mysqli_query($this->DB_MYSQL_CONNECTION(), $query)) {
      while ($values = mysqli_fetch_assoc($this->result)) {
        $this->insert_Result=$this->DB_UPDATE_STATUS('0',$values['id']);;
      }
    } else {
      $this->insert_Result =  "YOUR USERNAME OR PASSWORD!!\n";
    }

    echo json_encode($this->insert_Result);
  }
  public function DB_SELECT_USER_BY_ID($id)
  {
    $query = "SELECT * FROM users WHERE id='$id'";

    if ($this->result = mysqli_query($this->DB_MYSQL_CONNECTION(), $query)) {
      while ($values = mysqli_fetch_assoc($this->result)) {
        $this->insert_Result=$values;
        $this->username=$values['username'];
        $this->password=$values['password'];
        $this->token=$values['token'];
        $this->date_heure=$values['date_heure'];
        $this->status=$values['status'];
        $this->id=$values['id'];
        $this->name=$values['name'];
        $this->lastname=$values['lastname'];
        $this->country=$values['country'];
      }
    } else {
      $this->insert_Result =  "YOUR USERNAME OR PASSWORD!!\n";
    }

    return json_encode($this->insert_Result);
  }
  public function DB_SELECT_USER_BY_USERNAME($username)
  {
    $query = "SELECT * FROM users WHERE username='$username'";

    if ($this->result = mysqli_query($this->DB_MYSQL_CONNECTION(), $query)) {
      while ($values = mysqli_fetch_assoc($this->result)) {
        $this->insert_Result=$values;
        $this->username=$values['username'];
        $this->password=$values['password'];
        $this->token=$values['token'];
        $this->date_heure=$values['date_heure'];
        $this->status=$values['status'];
        $this->id=$values['id'];
        $this->name=$values['name'];
        $this->lastname=$values['lastname'];
        $this->country=$values['country'];
      }
    } else {
      $this->insert_Result =  "YOUR USERNAME OR PASSWORD!!\n";
    }

    return json_encode($this->insert_Result);
  }
  public function DB_SELECT_USER_BY_PASSWORD($password)
  {
    $query = "SELECT * FROM users WHERE password='$password'";

    if ($this->result = mysqli_query($this->DB_MYSQL_CONNECTION(), $query)) {
      while ($values = mysqli_fetch_assoc($this->result)) {
        $this->insert_Result=$values;
        $this->username=$values['username'];
        $this->password=$values['password'];
        $this->token=$values['token'];
        $this->date_heure=$values['date_heure'];
        $this->status=$values['status'];
        $this->id=$values['id'];
        $this->name=$values['name'];
        $this->lastname=$values['lastname'];
        $this->country=$values['country'];
      }
    } else {
      $this->insert_Result =  "YOUR USERNAME OR PASSWORD!!\n";
    }

    return json_encode($this->insert_Result);
  }
  public function DB_SELECT_ALL_USERS()
  {
    $result=array();
    $query = "SELECT * FROM users";
    $this->result = mysqli_query($this->DB_MYSQL_CONNECTION(), $query);
      while ($values = mysqli_fetch_array($this->result,MYSQLI_ASSOC)) {
     $result[]=$values;
      }
      return json_encode($result);
  }
  public function DB_SELECT_ALL_USERS_ACTIVE($username)
  {
    $result=array();
    $query = "SELECT * FROM users WHERE status='1'";
    $this->result = mysqli_query($this->DB_MYSQL_CONNECTION(), $query);
      while ($values = mysqli_fetch_array($this->result,MYSQLI_ASSOC)) {
     $result[]=$values;
      }
      return json_encode($result);
  }
  /* CREAT Transanction & PayPal */ 

  public function DB_CREATE_PAYPAL_DATAS($firebaseid,$payid,$amount,$currency,$status,$username){
    $query = "INSERT INTO `paypal`(`firebaseID`, 
    `payid`, 
    `amount`, 
    `currency`, 
    `status`, 
    `username`) 
    VALUES ('$firebaseid',
    '$payid',
    '$amount',
    '$currency',
    '$status',
    '$username')";

    if (mysqli_query($this->DB_MYSQL_CONNECTION(), $query)) {
     
     $this->insert_Result=$this->DB_SELECT_TRANSANCTION_PAYPAL($firebaseid);
     // $this->insert_Result = "insert succefully" . mysqli_insert_id($this->DB_MYSQL_CONNECTION());
    } else {
      $this->insert_Result =  "DO NOT INSERT !!\n";
    }

    return  $this->insert_Result;
  }
  public function DB_SELECT_TRANSANCTION_PAYPAL($firebaseid)
  {
    $query = "SELECT * FROM paypal WHERE firebaseID='$firebaseid'";

    if ($this->result = mysqli_query($this->DB_MYSQL_CONNECTION(), $query)) {
      while ($values = mysqli_fetch_assoc($this->result)) {
        $this->insert_Result=$values;       
      }
    } else {
      $this->insert_Result =  "YOUR USERNAME OR PASSWORD!!\n";
    }

    return json_encode($this->insert_Result);
  }
  public function DB_SELECT_TRANSANCTION_PAYPAL_BY_USERNAME($username)
  {
    $query = "SELECT * FROM paypal WHERE username='$username'";
    $result=array();
    $this->result = mysqli_query($this->DB_MYSQL_CONNECTION(), $query);
      while ($values = mysqli_fetch_array($this->result,MYSQLI_ASSOC)) {
     $result[]=$values;
      }
      return json_encode($result);
  }


/*Recharges Datas */
public function DB_CREATE_MOBILE_TOPUP_DATAS($firebaseid,
$Tocountry,
$payamount,
$paycurrency,
$rechargeNumber,
$transanctionid,
$date_heure,
$operatorName,
$operatorId,
$username){
  $query = "INSERT INTO `recharges`(
    `firebaseID`,
     `Tocountry`,
      `payAmount`,
       `payCurrency`,
        `rechargeNumber`,
         `transactionid`,
          `date_heure`,
           `OperatorName`,
            `operatorID`,
             `userName`) 
             VALUES ('$firebaseid','$Tocountry',
             '$payamount','$paycurrency',
             '$rechargeNumber','$transanctionid',
             '$date_heure','$operatorName',
             '$operatorId','$username')";

  if (mysqli_query($this->DB_MYSQL_CONNECTION(), $query)) {
   
   $this->insert_Result=$this->DB_SELECT_TRANSANCTION_TOPUP($firebaseid);
   // $this->insert_Result = "insert succefully" . mysqli_insert_id($this->DB_MYSQL_CONNECTION());
  } else {
    $this->insert_Result =  "DO NOT INSERT !!\n";
  }

  return  $this->insert_Result;
}
public function DB_SELECT_TRANSANCTION_TOPUP($firebaseid)
{
  $query = "SELECT * FROM recharges WHERE firebaseID='$firebaseid'";

  if ($this->result = mysqli_query($this->DB_MYSQL_CONNECTION(), $query)) {
    while ($values = mysqli_fetch_assoc($this->result)) {
      $this->insert_Result=$values;       
    }
  } else {
    $this->insert_Result =  "YOUR USERNAME OR PASSWORD!!\n";
  }

  return json_encode($this->insert_Result);
}
public function DB_SELECT_TRANSANCTION_TOPUP_BY_USERNAME($username)
{
  $query = "SELECT * FROM recharges WHERE username='$username'";
  $result=array();
  $this->result = mysqli_query($this->DB_MYSQL_CONNECTION(), $query);
    while ($values = mysqli_fetch_array($this->result,MYSQLI_ASSOC)) {
   $result[]=$values;
    }
    return json_encode($result);
}
public function DB_TOKEN_RELOADLY_CLIENT_ID_SECRET(){
  $query = "SELECT * FROM token";

  if ($this->result = mysqli_query($this->DB_MYSQL_CONNECTION(), $query)) {
    while ($values = mysqli_fetch_assoc($this->result)) {
      $this->client_id=$values['clientid'];
      $this->client_secret=$values['clientsecret'];
    }
  } else {
    $this->insert_Result =  "YOUR USERNAME OR PASSWORD!!\n";
  }

  return json_encode($this->insert_Result);
}

/*COUNTRIES*/ 
function DB_COUNTRIES_REGISTER(){
  $query = "SELECT * FROM countries";
  $result=array();
  $this->result = mysqli_query($this->DB_MYSQL_CONNECTION(), $query);
    while ($values = mysqli_fetch_array($this->result,MYSQLI_ASSOC)) {
   $result[]=$values;
    }
    return json_encode($result);
}
function DB_COUNTRIE_DETAILS_SEARCH_BY_ISO($countrycode){
  $query = "SELECT * FROM `countries` WHERE `country_code`='$countrycode'";
  $result=array();
  $this->result = mysqli_query($this->DB_MYSQL_CONNECTION(), $query);
    while ($values = mysqli_fetch_assoc($this->result)) {
      $this->countrieid=$values['id'];
      $this->countriephonecode=$values['phone_code']; 
      $this->countrycodeIso=$values['country_code'];
      $this->countryName=$values['country_name'];
 
    }
    
}

/*GESTION DES PAGES*/
public function DB_PAGES_WEB($page){
 
  if ($page !=='') {
    $query = "SELECT * FROM pages WHERE hash_page='$page'";
    if($this->result = mysqli_query($this->DB_MYSQL_CONNECTION(), $query)){
      while ($values = mysqli_fetch_assoc($this->result)) {
        $this->pageid=$values['id'];
        $this->page=$values['page']; 
        $this->pagehash=$values['hash_page'];
        $this->pageurl=$values['url']; 
      
      }
    }else{
      $this->pageurl="pages/views/home.php"; 
    }
  }else{
    $this->pageurl="pages/views/home.php"; 
  }
  
 
} 
public function DB_PAGES_WEB_ACTION($page){
 
  if ($page !=='') {
    $query = "SELECT * FROM pages WHERE page='$page'";
    if($this->result = mysqli_query($this->DB_MYSQL_CONNECTION(), $query)){
      while ($values = mysqli_fetch_assoc($this->result)) {
        $this->pageid=$values['id'];
        $this->page=$values['page']; 
        $this->pagehash=$values['hash_page'];
        $this->pageurl=$values['url']; 
      
      }
    }else{
      $this->pageurl="pages/views/home.php"; 
    }
  }else{
    $this->pageurl="pages/views/home.php"; 
  }
  
 
} 
public function DB_PAGES_WEB_ARRAY(){
  $query = "SELECT * FROM pages";
  $result=array();
  $this->result = mysqli_query($this->DB_MYSQL_CONNECTION(), $query);
    while ($values = mysqli_fetch_array($this->result,MYSQLI_ASSOC)) {
   $result[]=$values;
    }
    return json_encode($result);
}
public function DB_SELECT_STRIPE_CLIENT($stripeApi){
    $query = "SELECT * FROM stripeapi WHERE env='$stripeApi'";
    if($this->result = mysqli_query($this->DB_MYSQL_CONNECTION(), $query)){
      while ($values = mysqli_fetch_assoc($this->result)) {
        $this->stripeAp=$values['client'];
      
      }
    }else{
   
    }
 
  
 
}
}
