<?php


class RequestController
{
	const VALID_METHODS = array('GET', 'POST', 'PUT', 'DELETE');
	const VALID_PROTOCOLS = array('HTTP', 'HTTPS');
	const VALID_CLIENT_ADDRS = array('HTTP', 'HTTPS');
	

	public function create_request($request_info)
	{
		if(!self::is_valid_method($request_info['REQUEST_METHOD']))
		{
			return array("code" => "405", "message" => "method not allowed");
			
		}

		if(!self::is_valid_protocol(substr($request_info['SERVER_PROTOCOL'], 0, -4)))
		{
			return array("code" => "404", "message" => "Not found");
			
		}

		
		


	//	$request_info['SERVER_ADDR'];
	//	$request_info['REQUEST_ADDR'];
	//	$request_info['REQUEST_URI'];
	//	$request_info['QUERY_STRING'];
	//	file_get_contents('php://input');
		
	//	return new Request();
		
	}
	
	public function is_valid_method($method)
	{
		if( is_null($method) || !in_array($method, self::VALID_METHODS))
			return false;
		
		return true;
	}


	public function is_valid_protocol($method)
	{
		if( is_null($method) || !in_array($method, self::VALID_PROTOCOLS))
			return false;
		
		return true;
	}


	public function is_valid_client_addr($method)
	{
	    $ipaddress = $method;
	    if (getenv('HTTP_CLIENT_IP'))
		$ipaddress = getenv('HTTP_CLIENT_IP');
	    else if(getenv('HTTP_X_FORWARDED_FOR'))
		$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
	    else if(getenv('HTTP_X_FORWARDED'))
		$ipaddress = getenv('HTTP_X_FORWARDED');
	    else if(getenv('HTTP_FORWARDED_FOR'))
		$ipaddress = getenv('HTTP_FORWARDED_FOR');
	    else if(getenv('HTTP_FORWARDED'))
	       $ipaddress = getenv('HTTP_FORWARDED');
	    else if(getenv('REMOTE_ADDR'))
		$ipaddress = getenv('REMOTE_ADDR');
	    else
		$ipaddress = 'UNKNOWN';
	  		
		return true;
	}















}
