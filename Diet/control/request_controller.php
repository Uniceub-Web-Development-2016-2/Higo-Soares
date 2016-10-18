<?php

include ('./control/resource_controller.php');
include_once('./model/request.php');

class RequestController
{
	const VALID_METHODS = array('GET', 'POST', 'PUT', 'DELETE');
	const VALID_PROTOCOLS = array('HTTPS/1.0', 'HTTP/1.1', 'HTTPS/1.1');
	const VALID_PATH = '/Diet/';
	const VALID_SERVER_NAME = 'localhost';


	private function create_request($request_info)
	{
		if(!self::is_valid_method($request_info['REQUEST_METHOD']))
		{
			return array("code" => "405", "message" => "method not allowed");
			
		}

		
		if(!self::is_valid_protocol($request_info['SERVER_PROTOCOL']))
		{
			return array("code" => "505", "message" => "protocol does not support");
			
		}
		
	
		if(!self::is_valid_remote_addr($request_info['REMOTE_ADDR']))
		{
			return array("code" => "404", "message" => "Remote ip not found");
			
		}

		if (!self::is_valid_servername($request_info['SERVER_NAME'])) {
 			return array(
 				"code" => "406", "message" => "Not Acceptable");
 		}
 
 		if (!self::is_valid_path($request_info['REQUEST_URI'])) {
 			return array(
 				"code" => "406", "message" => "Not Acceptable");
 		}

		
		if(!self::is_valid_query_string($request_info['QUERY_STRING']))
		{
			return array("code" => "404", "message" => "Query not found");
			
		}	
		


		
		return new Request($request_info['REQUEST_METHOD'],$request_info['SERVER_PROTOCOL'],$request_info['SERVER_ADDR'],$request_info['REMOTE_ADDR'],$request_info['REQUEST_URI'],$request_info['QUERY_STRING'],file_get_contents('php://input'));
		
	}
	
	public function is_valid_method($method)
	{
		if( is_null($method) || !in_array($method, self::VALID_METHODS))
			return false;
		
		return true;
	}

	public function is_valid_protocol($protocol)
	{
		if( is_null($protocol) || !in_array($protocol, self::VALID_PROTOCOLS))
			return false;
		
		return true;
	}

	public function is_valid_remote_addr($remoteip)
	{
	if(!filter_var($remoteip, FILTER_VALIDATE_IP))
				return false;
		
			return true;
	}

	public function is_valid_servername($servername)
 	{
 		if (is_null($servername) || !self::VALID_SERVER_NAME) {
 			return false;
 		}
 
 		return true;
 	}
 
 	public function is_valid_path($requesturi)
 	{
 		$path = parse_url($requesturi)['path'];
 		if (is_null($path) || !self::VALID_PATH) {
 			return false;
 		}
 
 		return true;
 	}

		public function is_valid_query_string($querystring)
	{
	if(is_null($querystring) || !empty($_REQUEST['param']))
				return false;
		
			return true;
	}



	public function execute() {
		$request = self::create_request($_SERVER);
		$resource_controller = new ResourceController();
	        return $resource_controller->treat_request($request);
	}












}
