<?php
// call curl to POST request
function checkCaptcha($publickey) {
  $recaptcha_secret = '6Ldb3HgbAAAAAPNixfFhN2lCXzDtb6TP1CmPrNoB';
  $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
  $recaptcha_response = $publickey;

     // Make and decode POST request:
  $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $recaptcha_response);
  $recaptcha = json_decode($recaptcha);
  return $recaptcha->success;
}
?>