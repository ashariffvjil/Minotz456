<?php
error_reporting(0);
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
                array(   'first_name'=>'xsd:string',
						 'last_name'=>'xsd:string',
						 'country_id'=>'xsd:string',
						 'zipcode'=>'xsd:string',
						 'occupation_id'=>'xsd:string',
						 'username'=>'xsd:string',
						 'email'=>'xsd:string',
						 'password'=>'xsd:string'),
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

//Register a Signin method that has parameters and return types
$server->register('Minotz.signin', 	
                // parameter list:
                array('email'=>'xsd:string',
				      'password'=>'xsd:string'),
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
                'Minotz  Signin  Method Parameters');
//Signin Method End method

//Register a forgot password method that has parameters and return types
$server->register('Minotz.forgot-password', 	
                // parameter list:
                array('email'=>'xsd:string'),
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
                'Minotz  forgot password  Method Parameters');
//forgot password Method Ends

//Register a InboxView method that has parameters and return types
$server->register('Minotz.inboxview',
                  // parameter list:
                array('users_id'=>'xsd:string'),
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
                'Minotz  InboxView  Method Parameters');
//InboxView Method End method

//Register a filter by date InboxView method that has parameters and return types
$server->register('Minotz.inboxbydate',
                  // parameter list:
                array('users_id'=>'xsd:string',
				      'date'=>'xsd:string'),
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
                'Minotz  InboxView by date Method Parameters');
//Register a filter by date InboxView method Ends

//Register a filter by name or id InboxView method that has parameters and return types
$server->register('Minotz.inboxbyname',
                  // parameter list:
                array('users_id'=>'xsd:string',
				      'patientname'=>'xsd:string',
					  'patientid'=>'xsd:string'),
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
                'Minotz  InboxView by Name Method Parameters');
//Register a filter by name or id InboxView method Ends

//Register a Demographics method that has parameters and return types
$server->register('Minotz.demographics',
                  // parameter list:
				  array('patient_id'=>'xsd:string'),
				  //return values
				  array('return'=>'xsd:string'),
				  //namespaces:
				  $namespace,
				  //soapaction: (use default)
				  false,
				  //style: rpc or document
				  'rpc',
				  //use: encoded or literal
				  'encoded',
				  //description: documentation for the method
				  'Minotz Delete Patient by Id Method Parameter');
//Register a Demographics method ends				  
				   		

// Get our posted data if the service is being consumed
// otherwise leave this data blank.                
$POST_DATA = isset($GLOBALS['HTTP_RAW_POST_DATA']) 
              ? $GLOBALS['HTTP_RAW_POST_DATA'] : '';

// pass our posted data (or nothing) to the soap service                    
$server->service($POST_DATA); 
exit;               
?>