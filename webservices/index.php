<?php
require_once("lib/nusoap.php");
require_once("lib/class.db.php");

$namespace = "http://".SERVER_PATH."/Minotz/webservices/index.php";
  
// create a new soap server
$server = new soap_server();
// configure our WSDL
$server->configureWSDL("Minotz Server",'urn:Minotzwsdl');
// set our namespace
$server->wsdl->schemaTargetNamespace = $namespace;

//Register a Registration method that has parameters and return types
$server->register('Minotz.registration', 	
                // parameter list:
                array(   'name'=>'xsd:string',
						 'image'=>'xsd:string', 
						 'street'=>'xsd:string',
						 'province'=>'xsd:string',
						 'town'=>'xsd:string',
						 'pincode'=>'xsd:int',
						 'mobilenumber'=>'xsd:string',
						 'emailid'=>'xsd:string',
						 'password'=>'xsd:string',
						 'somethingaboutmyself'=>'xsd:string',
						 'user_id'=>'xsd:int'
					 ),
                // return value(s):
                array('return'=>'xsd:string'),
                // namespace:
                $namespace,
                // soapaction: (use default)
                false,
                // style: rpc or document
                'rpc',
                // use: encoded or literal
                'encoded',
                // description: documentation for the method
                'Minotz  Registration  Method Parameters');

//Registartion Method End method

//Register a Get Profile method that has parameters and return types
$server->register('Minotz.get_profile', 	
                // parameter list:
                array('user_id'=>'xsd:int' ),
                // return value(s):
                array('return'=>'xsd:string'),
                // namespace:
                $namespace,
                // soapaction: (use default)
                false,
                // style: rpc or document
                'rpc',
                // use: encoded or literal
                'encoded',
                // description: documentation for the method
                'Minotz  Get Profile  Method Parameters');
//Get Profile Method End method

//Register a Get Profile method that has parameters and return types
$server->register('Minotz.get_user_details', 	
                // parameter list:
                array('user_id'=>'xsd:int' ),
                // return value(s):
                array('return'=>'xsd:string'),
                // namespace:
                $namespace,
                // soapaction: (use default)
                false,
                // style: rpc or document
                'rpc',
                // use: encoded or literal
                'encoded',
                // description: documentation for the method
                'Minotz  Get Personal Details  Method Parameters');
//Get Profile Method End method

		


//Register a Post Task method that has parameters and return types
$server->register('Minotz.post_task', 	
                // parameter list:
                array(   'user_id'=>'xsd:int',
						 'task_name'=>'xsd:string',
						 'image'=>'xsd:string', 
						 'task_amount'=>'xsd:string',
						 'expiry'=>'xsd:string',
						 'proxmity'=>'xsd:string',
						 'task_destination'=>'xsd:string',
						 'payment_type'=>'xsd:string',
						 'task_description'=>'xsd:string',
						 'share_number'=>'xsd:string',
						 'task_id'=>'xsd:int'
					 ),
                // return value(s):
                array('return'=>'xsd:string'),
                // namespace:
                $namespace,
                // soapaction: (use default)
                false,
                // style: rpc or document
                'rpc',
                // use: encoded or literal
                'encoded',
                // description: documentation for the method
                'Minotz Post Task Method Parameters');

//Post Task Method End method

//Register a Get Task  method that has parameters and return types
$server->register('Minotz.get_task_details', 	
                // parameter list:
                array('task_id'=>'xsd:int' ),
                // return value(s):
                array('return'=>'xsd:string'),
                // namespace:
                $namespace,
                // soapaction: (use default)
                false,
                // style: rpc or document
                'rpc',
                // use: encoded or literal
                'encoded',
                // description: documentation for the method
                'Minotz  Get Task  Method Parameters');
//Get Task   Method End method

//Register a Delete Task  method that has parameters and return types
$server->register('Minotz.delete_task', 	
                // parameter list:
                array('task_id'=>'xsd:int' ),
                // return value(s):
                array('return'=>'xsd:string'),
                // namespace:
                $namespace,
                // soapaction: (use default)
                false,
                // style: rpc or document
                'rpc',
                // use: encoded or literal
                'encoded',
                // description: documentation for the method
                'Minotz  delete Task  Method Parameters');
//Delete Task   Method End method

//Register a Get Task List method that has parameters and return types
$server->register('Minotz.get_task_history', 	
                // parameter list:
                array('user_id'=>'xsd:int',
				  'flag'=>'xsd:int'),
                // return value(s):
                array('return'=>'xsd:string'),
                // namespace:
                $namespace,
                // soapaction: (use default)
                false,
                // style: rpc or document
                'rpc',
                // use: encoded or literal
                'encoded',
                // description: documentation for the method
                'Minotz  Get Task Lists  Method Parameters');
//Get Task  List Method End method

//Register a  Bid on Task method that has parameters and return types
$server->register('Minotz.bid_on_task', 	
                // parameter list:
               	 array( 'user_id'=>'xsd:int',
						'bid_amount'=>'xsd:string', 
						'task_id'=>'xsd:int',
						'allow_contact'=>'xsd:int',
						'distance'=>'xsd:int'),
                // return value(s):
                array('return'=>'xsd:string'),
                // namespace:
                $namespace,
                // soapaction: (use default)
                false,
                // style: rpc or document
                'rpc',
                // use: encoded or literal
                'encoded',
                // description: documentation for the method
                'Minotz  Add to Favorites  Method Parameters');

//Get Bid Details by Bid id   End method

$server->register('Minotz.get_bid_details', 	
                // parameter list:
               	 array('bid_id'=>'xsd:int'),
                // return value(s):
                array('return'=>'xsd:string'),
                // namespace:
                $namespace,
                // soapaction: (use default)
                false,
                // style: rpc or document
                'rpc',
                // use: encoded or literal
                'encoded',
                // description: documentation for the method
                'Minotz  Bid Details  Method Parameters');

//Get Bid Details by Bid id  Methods Ends 			


$server->register('Minotz.get_bid_list', 	
                // parameter list:
               	 array('task_id'=>'xsd:int'),
                // return value(s):
                array('return'=>'xsd:string'),
                // namespace:
                $namespace,
                // soapaction: (use default)
                false,
                // style: rpc or document
                'rpc',
                // use: encoded or literal
                'encoded',
                // description: documentation for the method
                'Minotz  Bid list  Method Parameters');

//Get Bid Details by Bid id  Methods Ends 			

//Get Bid Details by Task id and Consumer  id End method

$server->register('Minotz.get_bid_by_task_n_consumer', 	
                // parameter list:
               	 array('task_id'=>'xsd:int',
				 	   'consumer_id'=>'xsd:int'),
                // return value(s):
                array('return'=>'xsd:string'),
                // namespace:
                $namespace,
                // soapaction: (use default)
                false,
                // style: rpc or document
                'rpc',
                // use: encoded or literal
                'encoded',
                // description: documentation for the method
                'Minotz  Add to Favorites  Method Parameters');

//Get Bid Details by Bid id  Methods Ends 						
				
//Register a Review method that has parameters and return types
$server->register('Minotz.post_review', 	
                // parameter list:
                array(   'user_id'=>'xsd:int',
						 'task_id'=>'xsd:int',
						 'provider_id'=>'xsd:int', 
						 'description'=>'xsd:string',
						 'rating'=>'xsd:float'	 ),
                // return value(s):
                array('return'=>'xsd:string'),
                // namespace:
                $namespace,
                // soapaction: (use default)
                false,
                // style: rpc or document
                'rpc',
                // use: encoded or literal
                'encoded',
                // description: documentation for the method
                'Minotz  Post Review  Method Parameters');

//Post Review  Method End method

//Register a  Add to Favorites method that has parameters and return types
$server->register('Minotz.add_to_favorites', 	
                // parameter list:
               	 array('user_id'=>'xsd:int',
						'provider_id'=>'xsd:int', 
						 'task_id'=>'xsd:int'),
                // return value(s):
                array('return'=>'xsd:string'),
                // namespace:
                $namespace,
                // soapaction: (use default)
                false,
                // style: rpc or document
                'rpc',
                // use: encoded or literal
                'encoded',
                // description: documentation for the method
                'Minotz  Add to Favorites  Method Parameters');

//Add to Favorites  Method End method


// Get our posted data if the service is being consumed
// otherwise leave this data blank.                
$POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) 
              ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';

// pass our posted data (or nothing) to the soap service                    
$server->service($POST_DATA);                
exit();

?>