<?php
//This library is ofcourse GNU, and used at your own risk..and so on..... ;-)

// Include 2Checkout Class
include_once ('tco_payment_class.php');

// Create a new object
$newResponse = new TCO_Payment();

// Specify your 2CheckOut vendor id(2Checkout account number), secret word(defined on the Site Management page in your 2Checkout admin) and demo setting ('Y' for On, 'N' for Off)
$newResponse->setAcctInfo('1303908', 'tango', 'Y');

// Print returned parameters and check against MD5 hash
$newResponse->getResponse();

?>