<?php 
//app Pensamentos Soltos e Pequenos Devaneios
/*  $config = array(
      'appId' => '109929915831199',
      'secret' => 'c38cbcacececfbd1bcf90ec4aab15ee6',
      'fileUpload' => false, // optional
      'allowSignedRequest' => false, // optional, but should be set to false for non-canvas apps
  );
  */
//app Pensamentos Soltos e Pequenos Devaneios
  use Facebook\FacebookSession;
// add other classes you plan to use, e.g.:
// use Facebook\FacebookRequest;
  use Facebook\GraphUser;
// use Facebook\FacebookRequestException;

FacebookSession::setDefaultApplication('109929915831199', 'c38cbcacececfbd1bcf90ec4aab15ee6');