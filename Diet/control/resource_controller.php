<?php

include_once ('./model/request.php');
include_once ('./db/db_manager.php');


class ResourceController
{	
	private $RESOURCEMAP = ['user' => 'control_user', 'diet' => 'control_diet', 'food' => 'control_food', 'objective' => 'control_objective', 'location' => 'control_location', 'category' => 'control_category', 'index.php' => 'index'];
	private $tables_relational = array("diet/food"=> "diet_food" , "food/location"=> "food_location", "user/diet"=> "user_diet");
	private $OBJECTIVEMAP = ['GET' => 'search' , 'POST' => 'create' , 'PUT' => 'update', 'DELETE' => 'remove'];
	private $FOODMAP = ['GET' => 'search' , 'POST' => 'create' , 'PUT' => 'update', 'DELETE' => 'remove'];
	private $DIETMAP = ['GET' => 'search' , 'POST' => 'create' , 'PUT' => 'update', 'DELETE' => 'remove'];
	private $USERMAP = ['GET' => 'search' , 'POST' => 'validate_login' , 'PUT' => 'update', 'DELETE' => 'remove'];
	private $CATEGORYMAP = ['GET' => 'search' , 'POST' => 'create' , 'PUT' => 'update', 'DELETE' => 'remove'];
	private $LOCATIONMAP = ['GET' => 'search' , 'POST' => 'create' , 'PUT' => 'update', 'DELETE' => 'remove'];
	private $WORKSHOPMAP = ['GET' => 'search' , 'POST' => 'create' , 'PUT' => 'update', 'DELETE' => 'remove'];



	
	
	public function treat_request($request) {
		/*if($request->getMethod() == "GET" && self::resource_combo($request) == "combobox_alimentos")
		{
			return $this->combobox_alimentos($request);
		}*/
		if(empty($request->getResource())){
			return "This Page isn't. Sorry!";
		}
		return $this->{$this->RESOURCEMAP[$request->getResource2()]}($request);
		//return $this->{$this->METHODMAP[$request->getMethod()]}($request);
	
	}
	
	function control_user($request)
	{
		return $this->{$this->USERMAP[$request->getMethod()]}($request);
	}
	
	function control_diet($request)
	{
		return $this->{$this->DIETMAP[$request->getMethod()]}($request);
	}
	
	function control_food($request)
	{
		$path = $request->getResource();
		$resource = explode("/", $path);
		//var_dump($resource[1]);
		/*if($resource[1] == 'combobox_alimentos'){
			self::combobox_alimentos($request);
		}*/
		return $this->{$this->FOODMAP[$request->getMethod()]}($request);
	}
	
	function control_objective($request)
	{
		return $this->{$this->OBJECTIVEMAP[$request->getMethod()]}($request);
	}
	function control_location($request)
	{
		return $this->{$this->LOCATIONMAP[$request->getMethod()]}($request);
	}
	
	function control_category($request)
	{
		return $this->{$this->CATEGORYMAP[$request->getMethod()]}($request);
	}


	private function search($request) {
		$tablename = self::joins($request);

		if(empty($request->getParameters())){
 				$query = 'SELECT * FROM '.$tablename.';';
				return self::select($query);
 		}else{
		$query = 'SELECT * FROM '.$tablename.' WHERE '.self::queryParamsGet($request->getParameters()). ';';
		return self::select($query); 
		}
	}
	
	public function select($query){
		$result = (new DBConnector())->query($query);
		//var_dump($query);
		return $result->fetchAll(PDO::FETCH_ASSOC);

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
			$query .= $key.' = '.$value.' AND ';				
		}
		$query = substr($query,0,-5);
		return $query;
	
	}
	private function joins($request){
		$table="";
		$tablename="";

		$path = $request->getResource();
		$resource = explode("/", $path);


		foreach($resource as $result){
		$table .= $result. ' JOIN ';
		$tablename = substr($table,0,-6);
		}
		

		
		return $tablename .= self::select_relation($request);

	}
	
	

private function create($request) {
		$body = $request->getBody();
		$resource = $request->getResource2();
		$query = 'INSERT INTO '.$resource.' ('.$this->getColumns($body).') VALUES ('.$this->getValues($body).')';
		return self::execution_query($query);
		 
	}
	
	
	
	private function update($request) {
                $body = $request->getBody();
                $resource = $request->getResource();
                $query = 'UPDATE '.$resource2.' SET '. $this->getUpdateCriteria($body);
		return self::execution_query($query);
        }
	
	
	private function execution_query($query) {
		$conn = (new DBConnector())->prepare($query);
		$conn->execute();
		if ($conn->rowCount() > 0) {
    			echo '
    <script>
        alert("Sucesso!");
        window.location.href = "login.php";
    </script>
';
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
		var_dump($key);
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
	
	private function validate_post($request)
	{
		$path = $_SERVER['REQUEST_URI'];
		$resource = explode("/", $path);		
			if($resource[3] == "validate_login"){
				self::validate_login($request);
			}else{
				self::create($request);
			}			
		
	}
	
	private function validate_login($request)
	{
		$body = $request->getBody();
		$SQL='SELECT * FROM user WHERE '.$this->getFormsLogin($body);
	
		return self::login_query($SQL);
	}

	private function getFormsLogin($json)
	{
		$array = json_decode($json, true);
		$SQL = "";
		foreach($array as $key => $value) {
		$SQL .= $key.' = '."'".$value."'".' AND ';
		
		}
		$SQL = substr($SQL,0,-5);
		
		return $SQL;
	}

	private function login_query($query) {
		$conn = (new DBConnector())->prepare($query);
		$conn->execute();
		if ($conn->rowCount() > 0) {
		echo '<script>
		alert("Sucesso!");
		window.location.href = "../../Client_Diet/home.php";
	    		</script>';
	
		}else{
		echo     '<script>
		alert("Senha ou login inválido!");
		window.location.href = "../../Client_Diet/login.php";
	    		</script>';
		} 
		
	}


	private function resource_combo($request){
		$path = $request->getResource();
		$s = explode("?", $path);
        $r = explode("/", $s[0]);

        return $this->operation = $r[2];
	}



	private function combobox_alimentos($request){	
	$query= 'SELECT food, calories, category, food.id FROM food JOIN category'.' WHERE '.self::queryParamsGet($request->getParameters());
	return $result = self::select($query);
	}

	private function joins_combox_alimentos($request){
		$table = "";
		$tablename="";
		$path = $request->getResource();
		$s = explode("?", $path);
		$r = explode("/", $s[0]);

		$tablename = $r[0].' JOIN '.$r[1];		
		return $tablename;

	}

	/*
	function table_diet(){																		
	$query= "SELECT cod_user, cod_diet, weight, height, dat_init, dat_final, ideal_weight FROM `user_diet` join user join diet WHERE cod_user=user.id and cod_diet=diet.id and user='higo soares'";
	$conn1 = $conn->query($query);
	var_dump($values = $conn1->fetchAll(PDO::FETCH_ASSOC));	
	foreach ($values as $value => $key) {
	}
	$query2= 'SELECT cod_diet, cod_food, schedule, objective, food, calories, amount FROM `diet_food` join diet join objective join food WHERE cod_diet=1 and cod_food=food.id and cod_objective=objective.id';
	$conn2 = $conn->query($query2);
	$values2 = $conn2->fetchAll(PDO::FETCH_ASSOC);

	foreach($values2 as $value2 => $key2){
		echo '<tr> <th scope="row">'.$key2['schedule'].'</th> <td>'.$key2['food'].'</td> <td>'.$key2['amount'].'</td> </tr>';
	}
	}	*/
}
?>
