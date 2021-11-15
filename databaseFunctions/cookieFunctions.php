<?php

//require_once 'stripCookieSlashes.inc.php';
  function setCookieData($arr) {
    $cookiedata = getAllCookieData();
    if ($cookiedata == null) {
      $cookiedata = array();
    }
    foreach ($arr as $name => $value) {
      $cookiedata[$name] = $value;
    }
    setcookie('loggedIn', serialize($cookiedata), time() + 30*24*60*60,'/');
  }
  function getAllCookieData() {
    if (isset($_COOKIE['loggedIn'])) {
      $formdata = $_COOKIE['loggedIn'];
      if ($formdata != '') {
        return unserialize($formdata);
      } else {
        return array();
      }
    } else {
      return null;
    }
  }
  function getCookieData($name) {
    $cookiedata = getAllCookieData();
    //for testing return $cookiedata[0]['accountID'];
	if ($cookiedata != null &&
      isset($cookiedata[0][$name])) {
        return $cookiedata[0][$name];
      }
    }

?>