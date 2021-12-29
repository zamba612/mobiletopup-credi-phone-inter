<?php
require 'vendor/autoload.php';

use Panda\Mobiletopup\DBSQL;
use Panda\Mobiletopup\Roouter;
use Panda\Mobiletopup\Session;

/*$router=new AltoRouter();
$router=new Roouter(dirname(__DIR__).'/pages');
$router->get('/home','views/home','home');
$router->run();
$session=new Session();*/
 //echo password_hash("login", PASSWORD_DEFAULT);
 //$str = "home";
//echo '<br>'. md5($str);
$page='';

if (isset($_GET['page'])) {
 $page=explode('/', $_GET['page']);
//$page=$_GET['page'];

 


}
$connection=new DBSQL();
$page_url=new DBSQL();
$connection->DB_PAGES_WEB_ARRAY();
//echo $page_url;

if ($page =='') { 
  $connection->DB_PAGES_WEB($page);
  require $connection->pageurl;
}else{
for ($i=0; $i < count($page) ; $i++) { 
  //echo $page[$i].'<br>';
$page_url->DB_PAGES_WEB($page[$i]);


  if($page[$i]==$page_url->pagehash) { 
    require $page_url->pageurl;
    //require 'pages/views/home.php';
    //echo $connection->pageid;
  }else{
    require '404.php';
   
  }
  /*$json=json_decode($page_url,true);
  foreach ($json as $key => $value) {
 
   


  }*/

}
}
//var_dump($page);
//var_dump($_GET);
/*if ($page[$i] ==='$2y$10$wFITSTUx5xvv4.u/AxIGReJ0SNJDLAdd7z5LKcAiwMKDdfEytJrnq') {
  require 'account.php';
}elseif ($page[$i]=='$2y$10$Uu0P3oggkj4bVI7fDwOudel.RfBRdrUgjJ6n60XwWJDFjLTMjW.py' ) {
 require 'login.php';
}elseif ($page[$i]=="registration") {
 require 'registration.php';
}else*/
//echo json_encode($_GET);*/