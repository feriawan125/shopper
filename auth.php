<?php 
require __DIR__ . '/vendor/autoload.php';
use \Firebase\JWT\JWT;

class Authentication
{
  private static $key = "Auxxl2PMzx4AIQ8NxIQa3Tf8WGmTLl6B0n45sdkGqSveXYmUBMGJNuqWUKFErDr" ;
  
  // function __construct()
  // {
  //   $this->key = "Auxxl2PMzx4AIQ8NxIQa3Tf8WGmTLl6B0n45sdkGqSveXYmUBMGJNuqWUKFErDr";
  // }

  public static function validateToken($token)
  {
    try {
      $decoded = JWT::decode($token, self::$key, array('HS256'));
      $decoded_array = (array) $decoded;
      if (!empty($decoded_array['uid'])) {
        return true;
      }
      else {
        return false;
      }
    } 
    catch (\Throwable $th) {
      return false;
      die('Invalid Token!!');

    }
  }
  public static function getToken()
  {
    $iat = time();
    $exp = $iat + 3600;
    $uid = 1;
    $payload = array(
      'uid' => $uid,
      'iat' => $iat,
      'exp' => $exp
    );
    $jwt = JWT::encode($payload, self::$key);
    return $jwt;

  }
  public static function isAuth()
  {
    if (isset(getallheaders()['token'])) {
      $token = getallheaders()['token'];
      if(!self::validateToken($token)){
        die("Invalid Token!!");
      }
      return true;
    }else {
      die("Forbidden Access!!");
    }
    
  }

}


// if(getallheaders()['token']==="testing1234"){ 
// } 
// else{ 
//   header('location: ./');
// } 
?>