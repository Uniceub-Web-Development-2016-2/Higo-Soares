<?php 
include_once ('./db/db_manager.php');
include_once ('resource_controller.php');

session_start(); 


	if(isset($_GET['val_cpf']) && isset($_GET['num_password'])){
		$getLoing = $con->query("SELECT * FROM Login WHERE Login = '".$_GET['login']."' AND senha = '".$_GET['senha']."' ");

		$array = array();
		
		if(mysqli_num_rows($getLoing)){
			$array = array('resp' => 's');
		}else{
			$array = array('resp' => 'n');
		}

		echo json_encode($array);
	}



// Recupera o login 
$login = isset($_POST["val_cpf"]) ? addslashes(trim($_POST["val_cpf"])) : FALSE; 
// Recupera a senha, a criptografando em MD5 
$senha = isset($_POST["num_password"]) ? md5(trim($_POST["num_password"])) : FALSE; 

/** 
* Executa a consulta no banco de dados. 
* Caso o número de linhas retornadas seja 1 o login é válido, 
* caso 0, inválido. 
*/ 
$SQL="SELECT id, nme_user, num_password, admin FROM user WHERE val_cpf='".$login."'";
$return = (new ResourceController())->select($SQL);
$result_id = @mysql_query($SQL) or die("Erro no banco de dados!"); 
$total = @mysql_num_rows($result_id); 

// Caso o usuário tenha digitado um login válido o número de linhas será 1.. 
if($return) 
{ 
// Obtém os dados do usuário, para poder verificar a senha e passar os demais dados para a sessão 
$dados = @mysql_fetch_array($return); 

// Agora verifica a senha 
if(!strcmp($senha, $dados["num_password"])) 
{ 
// TUDO OK! Agora, passa os dados para a sessão e redireciona o usuário 
$_SESSION["id"]= $dados["id"]; 
$_SESSION["nme_user"] = stripslashes($dados["nome"]); 
header("Location: page.php"); 
exit; 
} 
// Senha inválida 
else 
{ 
echo     '<script>
        alert("Senha inválida!");
        window.location.href = "login.html";
    </script>';
exit; 
} 
} 
// Login inválido 
else 
{ 
echo
    '<script>
        alert("O login fornecido por você é inexistente!");
        window.location.href = "login.html";
    </script> '; 
exit; 
} 
?>
