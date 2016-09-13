<?php
//include('request.php');


class RequestController
{
	const VALID_METHODS = array('GET', 'POST', 'PUT', 'DELETE');
	const VALID_PROTOCOLS = array('HTTPS/1.0', 'HTTP/1.1', 'HTTPS/1.1');
	
	

	public function create_request($request_info)
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

		if(!self::is_valid_resource($request_info['REQUEST_URI']))
		{
			return array("code" => "406", "message" => "Not Acceptable");
			
		}

		if(!self::is_valid_query_string($request_info['QUERY_STRING']))
		{
			return array("code" => "404", "message" => "Query not found");
			
		}





	//	$request_info['REQUEST_ADDR'];
	//	file_get_contents('php://input');
		
	//	return new Request("GET", "http", "localhost", "172.22.51.128", "aula4", array("par1"=>123,"par2"=>1234));
		
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

	
		public function is_valid_resource($requesturi)
	{
	if(is_null($requesturi) || !is_dir($requesturi))
				return false;
		
			return true;
	}

		public function is_valid_query_string($querystring)
	{
	if(is_null($querystring) || !empty($_REQUEST['param']))
				return false;
		
			return true;
	}
	


	

}
