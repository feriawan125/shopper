<?php 
require __DIR__ . '/vendor/autoload.php';
use \Firebase\JWT\JWT;

class Authentication
{
  private static $key = "2B74521E1419CF192CDAAE8A75A45B648D6BC0613C9F88E851F2FA38695D19B97832589E41CD1CC4ECB91B06B62A036B2BA738EE8E2D876D8FE729DA575D0C07" ;
  
  // function __construct()
  // {
  //   $this->key = "Auxxl2PMzx4AIQ8NxIQa3Tf8WGmTLl6B0n45sdkGqSveXYmUBMGJNuqWUKFErDr";
  // }

  private static function decodeToken($token)
  {
    $decoded = JWT::decode($token, self::$key, array('HS256'));
    $decoded_array = (array) $decoded;
    return $decoded_array;
  }
  public static function validateToken($token)
  {
    try {
      $decoded_array = self::decodeToken($token);
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
  public static function getToken($uid, $role, $fname)
  {
    $iat = time();
    $exp = $iat + 3600*24;
    $payload = array(
      'uid' => $uid,
      'iat' => $iat,
      'exp' => $exp,
      'role'=> $role,
      'name'=> $fname

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
  public static function getUserRole($token){
    $decoded_array = self::decodeToken($token);
    $role = $decoded_array['role'];
    return $role;
  }
  public static function getUserFname($token){
    $decoded_array = self::decodeToken($token);
    $fname = $decoded_array['name'];
    return $fname;
  }
  public static function isAdmin()
  {
    $token = $_COOKIE['token'];
    if (self::getUserRole($token) != 'admin') {
      die("Forbidden Access!!");
    }
  }
  public static function isStaff()
  {
    $token = $_COOKIE['token'];
    $role = self::getUserRole($token);
    echo "<script> console.log('$role') </script>";
    if (self::getUserRole($token) == 'staff' || self::getUserRole($token) == 'admin') {
    }else{
      die("Forbidden Access!!");
    }
  }
  public static function isKasir()
  {
    $token = $_COOKIE['token'];
    $role = self::getUserRole($token);
    echo "<script> console.log('$role') </script>";
    if (self::getUserRole($token) == 'kasir' || self::getUserRole($token) == 'staff' || self::getUserRole($token) == 'admin') {
    }else{
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