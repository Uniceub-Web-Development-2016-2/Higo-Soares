<?php

include_once ('./model/request.php');
include_once ('./db/db_manager.php');


class ResourceController
{	
 	private $METHODMAP = ['GET' => 'search' , 'POST' => 'create' , 'PUT' => 'update', 'DELETE' => 'remove' ];
	private $tables_relational = array("diet/food"=> "diet_food" , "food/location"=> "food_location", "user/diet"=> "user_diet","diet/food/"=>"diet_food");



	
	
	public function treat_request($request) {
		return $this->{$this->METHODMAP[$request->getMethod()]}($request);
	
	}

	private function search($request) {
		$table="";
		$tablename="";

		$path = $request->getResource();
		$resource = explode("/", $path);

		foreach($resource as $result){
		$table .= $result. ' JOIN ';
		$tablename = substr($table,0,-6);
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
		$body = $request->getBody();
		//var_dump($body);
		$resource = $request->getResource();
		$query = 'INSERT INTO '.$resource.' ('.$this->getColumns($body).') VALUES ('.$this->getValues($body).')';
		return self::execution_query($query);
		 
	}
	
	
	
	private function update($request) {
                $body = $request->getBody();
                $resource = $request->getResource();
                $query = 'UPDATE '.$resource.' SET '. $this->getUpdateCriteria($body);
                //var_dump($query);
		//die();
		return self::execution_query($query);
        }
	
	
	private function selection_query($query) {
		$conn = (new DBConnector())->query($query);
		$results = $conn->fetchAll(PDO::FETCH_ASSOC);
		$json=json_encode($results, JSON_UNESCAPED_UNICODE);
		return $json;
	}
	
	
	private function execution_query($query) {
		$conn = (new DBConnector());
		if ($conn->query($query) === TRUE) {
    			echo "New record created successfully!";
		} else {
    			echo "Error: " . $query . "<br>";
		}
	}
	
	

		
	private function queryParams($params) {
		$query = "";		
		foreach($params as $key => $value) {
			$query .= $key.' = '."'".$value."'".' AND ';	
		}
		$query = substr($query,0,-5);
		if($query==null) {
			$query.=1;
		}
		return $query;
	}
	
	
	private function getUpdateCriteria($json)
	{
		$criteria = "";
		$where = " WHERE ";
		$array = json_decode($json, true);
		foreach($array as $key => $value) {
			if($key != 'id')
				$criteria .= $key." = '".$value."',";
			
		}
		return substr($criteria, 0, -1).$where." id = '".$array['id']."'";
	}
	
	
	
	private function getColumns($json) 
	{
		$array = json_decode($json, true);
		$keys = array_keys($array);
		return implode(",", $keys);
	
	}
	
	
	private function getValues($json)
        {
                $array = json_decode($json, true);
                $values = array_values($array);
                $string = implode("','", $values);
		return "'".$string."'";
        
        }
	

	
}




