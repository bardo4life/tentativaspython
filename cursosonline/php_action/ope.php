<?php
require_once 'conexao.php';

session_start();
$email = $_POST['email'];
$senha = $_POST['senha'];

//faz o query da tabela admin
$query_admin = $con->query("SELECT * FROM adm WHERE email_adm = '$email' AND senha = '$senha'");

//coloca os dados da tabela admin como variável
while ($row = mysqli_fetch_assoc($query_admin)){
    $id_adm = $row['id_adm']; 
    $nome = $row['nome'];
    $email_adm = $row['email_adm'];
}
//se o email colocado for igual o email de algum admin starta a sessão
if($email == $email_adm){
    if($query_admin-> num_rows > 0) {
        $_SESSION['id'] = $id_adm;
        $_SESSION['nome'] = $nome;
        $_SESSION['email'] = $email; 
        header("Location: admin_profile.php");
    }elseif($email == ""){
        echo 'Você esqueceu de inserir algum campo.';
        echo "<a href='../index.php'><button>Voltar</button></a>";
    }
}
else
{ $senha = md5($senha);

$result = $con->query("SELECT * FROM alunos WHERE email = '$email' AND senha = '$senha'"); 



while ($row = mysqli_fetch_assoc($result)){
$id = $row['id_aluno']; 
$nome = $row['nome'];
}


if($result -> num_rows > 0 ){
    $_SESSION['id'] = $id;
    $_SESSION['nome_aluno'] = $nome;
    $_SESSION['email'] = $email;
    $_SESSION['senha'] = $senha;
    header('location:../site.php');
}
else{
    unset ($_SESSION['login']);
    unset ($_SESSION['senha']);
    header('location:../index.php');
}
}

$con ->close();
?>