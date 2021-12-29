<?php
namespace Panda\Mobiletopup;

class notes{
public $support;
public $currency;
public $result=array();
public $response=array();
public function __construct($support,$currency) {
    $this->currency=$currency;
    $this->support=$support;

if ($this->support=="RANGE") {
return $this->response="Peut recharger à partir de 0.10 ".$this->currency.", limite 1000.00 ".$this->currency;
}elseif ($this->support=="FIXED") {
    return $this->response="Acceptes que les montants proposés, voir liste:"; 
}
return json_encode($this->response);
}



}