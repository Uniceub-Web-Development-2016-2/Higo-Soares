<?php

include_once ('request.php');
include_once ('db_manager.php');

class ResourceController
{	
 	private $METHODMAP = ['GET' => 'search' , 'POST' => 'create' , 'PUT' => 'update', 'DELETE' => 'remove' ];
	
	public function treat_request($request) {
		return $this->{$this->METHODMAP[$request->getMethod()]}($request);
	
	}

	private function search($request) {
		
		$query = 'SELECT * FROM '.$request->getResource().' WHERE '.self::queryParamsGet($request->getParameters()). ';';

		return self::select($query); 
	}
	
	private function select($query){
		$result = (new DBConnector())->query($query);
		var_dump($query);
		return $result->fetchAll();

	}	

		
	private function queryParamsGet($params) {
		if($params!=null){
		$query = "";		
		foreach($params as $key => $value) {
			$query .= $key." = '".$value."' AND ";	
		}
		$query = substr($query,0,-5);
		return $query;
		}
		return 1;
	}

	private function create($request) {
		
		$query = 'INSERT INTO '.$request->getResource().' ('.self::queryParamsPost($request->getParameters()).') VALUES ('. self::queryvaluesPost($request->getParameters()). ');';
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
		
		$query = 'UPDATE '.$request->getResource().' SET '.self::queryParamsPut($request->getParameters()). ';';
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




