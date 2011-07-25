<?php
//This script is ofcourse GNU, and used at your own risk..and so on..... ;-)

// Include 2Checkout Class
include_once ('tco_payment_class.php');

// Create a new object
$newSale = new TCO_Payment();

// Specify your 2CheckOut vendor id(2Checkout account number), secret word(defined on the Site Management page in your 2Checkout admin) and demo setting ('Y' for On, 'N' for Off)
$newSale->setAcctInfo('1303908', 'tango', 'Y');

// Specify purchase routine type (single_page or multi_page)
$newSale->setCheckout('single_page');



//Parameter Sets
// Specify the order details using either the Pass-Through-Products parameter set, Third Party Cart parameter set, Authorize.net Parameter set or Plug and Play parameter set. An example utilization of each parameter set is provided in the examples below.

//////////////////////////////PLEASE ONLY USE ONE PATAMETER SET////////////////////////////////////////

/****Pass-Through-Product parameter set - To use, uncomment and specify field values . ****/
//http://www.2checkout.com/blog/knowledge-base/merchants/tech-support/3rd-party-carts/parameter-sets/pass-through-product-parameter-set
#$newSale->addParam('sid', '1303908');				//Required - Identifies your account number - Already being passed in submitPayment()
$newSale->addParam('mode', '2CO');					//Required - Will always be '2CO'
//Lineitem Data (Each Lineitem is assigned a number starting with '0' and should increment)
$newSale->addParam('li_0_type', 'product');			//Required Lineitem Type - ‘product’, ‘shipping’, ‘tax’ or ‘coupon’
$newSale->addParam('li_0_name', 'Test Lineitem');	//Required - Lineitem name
$newSale->addParam('li_0_price', '9.99');			//Required - Lineitem Price
$newSale->addParam('li_0_tangible', 'Y');			//Required -  Tangible - ‘Y’ or ‘N’, if li_#_type is ‘shipping’ forced to ‘Y’
$newSale->addParam('li_0_quantity', '1'); 			//Quantity - defaults to 1 if not passed in
$newSale->addParam('li_0_product_id', '999');		//Prodcut ID
//Recurring Lineitems - Can be used with any Lineitem Type
$newSale->addParam('li_0_description', 'Test Description'); 	//Description
$newSale->addParam('li_0_recurrence', '1 Month');		//Recurrence - 
$newSale->addParam('li_0_duration', '9.99');		//Duration
$newSale->addParam('li_0_startup_fee', '0.99');		//Startup Fee
//Shipping Lineitem
$newSale->addParam('li_1_type', 'shipping');			//Required Lineitem Type - ‘product’, ‘shipping’, ‘tax’ or ‘coupon’
$newSale->addParam('li_1_name', 'Example Shipping Lineitem');	//Required - Lineitem name
$newSale->addParam('li_1_price', '3.00');			//Required - Lineitem Price
//Tax Lineitem
$newSale->addParam('li_2_type', 'tax');			//Required Lineitem Type - ‘product’, ‘shipping’, ‘tax’ or ‘coupon’
$newSale->addParam('li_2_name', 'Example Tax');	//Required - Lineitem name
$newSale->addParam('li_2_price', '0.59');			//Required - Lineitem Price
//Coupon Lineitem
$newSale->addParam('li_3_type', 'coupon');			//Required Lineitem Type - ‘product’, ‘shipping’, ‘tax’ or ‘coupon’
$newSale->addParam('li_3_name', 'Example Coupon');	//Required - Lineitem name
$newSale->addParam('li_3_price', '1.00');			//Required - Lineitem Price
//Additional Options
$newSale->addParam('li_0_option_0_name', 'Test Option');		//Option Name
$newSale->addParam('li_0_option_0_value', '1');		//Option Value
$newSale->addParam('li_0_option_0_surcharge', '1.00');		//Option Surcharge
/****End of Parameter Set****/

/****Third Party Cart parameter set - To use, uncomment and specify field values. ****/
//http://www.2checkout.com/blog/knowledge-base/merchants/tech-support/3rd-party-carts/parameter-sets/does-your-system-have-its-own-parameters-if-so-what-are-they
#$newSale->addParam('sid', '1303908');				//Required - 2Checkout account number- Already being passed in submitPayment()
#$newSale->addParam('cart_order_id', 'Test Cart ID 1');	//Required - Cart ID
#$newSale->addParam('total', '9.99');				//Required - Sale Total
//Lineitem Data (Each c_''_# is assigned a number starting with '0' and should increment)
#$newSale->addParam('id_type', '1');					//Always '1'
#$newSale->addParam('c_prod_0', '999,1');			//Product ID, Quantity
#$newSale->addParam('c_name_0', 'Test Product');		//Product Name
#$newSale->addParam('c_price_0', '9.99');			//Product Price
#$newSale->addParam('c_description_0', 'Example Product Description');		//Product Description
/****End of Parameter Set****/

/****Authorize.net parameter set - To use, uncomment and specify field values. ****/
//http://www.2checkout.com/blog/knowledge-base/merchants/tech-support/3rd-party-carts/parameter-sets/does-your-system-support-authorizenet-parameters-if-so-what-are-they
#$newSale->addParam('x_login', '532001');			//Required - Identifies your account number - Must uncomment if using this parameter set
#$newSale->addParam('x_invoice_num', 'Test Cart ID 1');	//Required - Cart ID
#$newSale->addParam('x_amount', '9.99');			//Required - Sale Total
//Lineitem Data (Each c_''_# is assigned a number starting with '0' and should increment)
#$newSale->addParam('id_type', '1');				//Always '1'
#$newSale->addParam('c_prod_0', '999,1');			//Product ID, Quantity
#$newSale->addParam('c_name_0', 'Test Product');		//Product Name
#$newSale->addParam('c_price_0', '9.99');			//Product Price
#$newSale->addParam('c_description_0', 'Example Product Description');		//Product Description
/****End of Parameter Set****/

/****Plug and Play parameter set - To use, uncomment and specify field values. ****/
//http://www.2checkout.com/blog/knowledge-base/merchants/tech-support/using-the-plug-n-play-cart/what-are-the-parameters-for-the-plug-n-play-cart
//Lineitem Data (Each product_id and quantity is assigned a number starting with '1' and should increment)
#$newSale->addParam('sid', '1303908');				//Required - Identifies your account number- Already being passed in submitPayment()
#$newSale->addParam('product_id1', '1');				//Product ID
#$newSale->addParam('quantity1', '1');				//Quantity
/****End of Parameter Set****/

/****Additional Supported Parameters - To use, uncomment and specify field values. ****/
#$newSale->addParam('lang', 'en');					//Language - Chinese – zh, Danish – da, Dutch – nl, French – fr, German – gr, Greek – el, Italian – it, Japanese – jp, Norwegian – no, Portuguese – pt, 
										//Slovenian – sl, 	Spanish – es_ib, Spanish – es_la, Swedish – sv
#$newSale->addParam('merchant_order_id', '1234567890');	//Merchant Order ID (50 characters max) - Additonal sale identifier, passed back as vendor_order_id on INS messages
#$newSale->addParam('skip_landing', '1');				//If set to '1' landing page of the multi-purchase will be skipped.
#$newSale->addParam('coupon', 'DISCOUNT');			//Coupon - Specify a 2Checkout created coupon code
#$newSale->addParam('pay_method', 'CC');			//Payment Method - Specify a default payment method selection


/****Customer Information - To use, uncomment and specify field values. ****/

//Customer Billing Information
$newSale->addParam('first_name', 'Testing'); 			//First Name
$newSale->addParam('last_name', 'Tester');			//Last Name
$newSale->addParam('email', 'noreply@2co.com');		//Email Address 
$newSale->addParam('phone', '877-294-0273');		//Phone Number
$newSale->addParam('street_address', '1785 Obrien Rd');	//Street Address 1
$newSale->addParam('street_address2', 'Apt.1');		//Street Address 2
$newSale->addParam('city', 'Columbus');				//City
$newSale->addParam('state', 'OH');				//State
$newSale->addParam('zip', '43228');				//Postal Code
$newSale->addParam('country', 'USA');				//Country

//Customer Shipping Information
$newSale->addParam('ship_name', 'Testing'); 				//Recipient Name
$newSale->addParam('ship_street_address', '1785 Obrien Rd');	//Recipient Street Address 1
$newSale->addParam('ship_street_address2', 'Apt.1');		//Recipient Street Address 2
$newSale->addParam('ship_city', 'Columbus');				//Recipient City
$newSale->addParam('ship_state', 'OH');					//Recipient State
$newSale->addParam('ship_zip', '43228');				//Recipient Postal Code
$newSale->addParam('ship_country', 'USA');				//Recipient Country


// Submit the payment to 2Checkout
$newSale->submitPayment();

?>