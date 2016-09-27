<?php

include_once ('request.php');

class ResourceController
{	
 	private $METHODMAP = ['GET' => 'search' , 'POST' => 'create' , 'PUT' => 'update', 'DELETE' => 'remove' ];
	
	public function treat_request($request) {
		return $this->{$this->METHODMAP[$request->getMethod()]}($request);
	
	}

	private function search($request) {
		$resource = strtok($request->getResource(), '?');
		$query = 'SELECT * FROM '.str_replace("/","",$resource).' WHERE '.self::queryParamsGet($request->getParameters()). ';';
		return $query; 
	}
		
	private function queryParamsGet($params) {
		$query = "";		
		foreach($params as $key => $value) {
			$query .= $key.' = '.$value.' AND ';	
		}
		$query = substr($query,0,-5);
		return $query;
	}

	private function create($request) {
		$resource = strtok($request->getResource(), '?');
		$query = 'INSERT INTO '.str_replace("/","",$resource).' ('.self::queryParamsPost($request->getParameters()).') VALUES ('. self::queryvaluesPost($request->getParameters()). ');';
		return $query; 
	}

	private function queryParamsPost($params) {
		$query = "";		
		foreach($params as $key => $value) {
			$query .= $key.' , ';	
		}
		$query = substr($query,0,-2);
		return $query;
	}

	private function queryvaluesPost($params) {
		$query = "";		
		foreach($params as $key => $value) {
			$query .= $value.' , ';	
		}
		$query = substr($query,0,-2);
		return $query;
	}

		private function update($request) {
		$resource = strtok($request->getResource(), '?');
		$query = 'UPDATE '.str_replace("/","",$resource).' SET '.self::queryParamsPut($request->getParameters()). ';';
		return $query; 
	}
	private function queryParamsPut($params) {
		$query = "";		
		foreach($params as $key => $value) {
			$query .= $key.' = '. $value. ' WHERE ';	
		}
		$query = substr($query,0,-7);
		return $query;
	}

		private function remove($request) {
		$resource = strtok($request->getResource(), '?');
		$query = 'DELETE * FROM '.str_replace("/","",$resource).' WHERE '.self::queryParamsGet($request->getParameters()). ';';
		return $query; 
	}

	

	
}




