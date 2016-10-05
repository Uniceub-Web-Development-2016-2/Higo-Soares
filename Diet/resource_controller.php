<?php

include_once ('request.php');
include_once ('db_manager.php');


class ResourceController
{	
 	private $METHODMAP = ['GET' => 'search' , 'POST' => 'create' , 'PUT' => 'update', 'DELETE' => 'remove' ];
	private $tables = array("user" => "tb_user" , "food" => "tb_food" , "objective" => "tb_objective", "diet" => "tb_diet", "location" => "tb_location");
	private $tables_relational = array("diet/food"=> "td_diet_food" , "food/location"=> "td_food_location", "user/diet"=> "td_user_diet",
"user/diet/objective"=> "td_user_diet", "diet/food/"=>"td_diet_food", "diet/food/objective/"=> "td_diet_food", "user/diet/food/location"=> "td_diet_food JOIN td_food_location");



	
	
	public function treat_request($request) {
		return $this->{$this->METHODMAP[$request->getMethod()]}($request);
	
	}

	private function search($request) {
		$table="";
		$tablename="";

		$path = $request->getResource();
		$resource = explode("/", $path);

		foreach($resource as $result){

		foreach ($this->tables as $key => $value) {
		if($key==$result){
		$table .= $value. ' JOIN ';
		$tablename = substr($table,0,-5);
		}
		}

		}
		$tablename .= self::select_relation($request);

		
		if(empty($request->getParameters())){
 				$query = 'SELECT * FROM '.$tablename.';';
				return self::select($query);
 		}else{
		$query = 'SELECT * FROM '.$tablename.' WHERE '.self::queryParamsGet($request->getParameters()). ';';
		return self::select($query); 
		}
	}
	
	private function select($query){
		$result = (new DBConnector())->query($query);
		var_dump($query);
		return $result->fetchAll(PDO::FETCH_OBJ);

	}

	private function select_relation($request){
		$table_relation="";

		foreach ($this->tables_relational as $key => $value) {
		if($key==$request->getResource()){
		$table_relation .= ' JOIN '.$value;
		}
		}
		return $table_relation; 
	}	

		
	private function queryParamsGet($params) {
		
		$query = "";		
		foreach($params as $key => $value) {
			$query .= $key." = ".$value." AND ";	
		}
		$query = substr($query,0,-5);
		return $query;
	
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




