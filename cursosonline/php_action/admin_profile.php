<?php

require_once 'conexao.php';

echo"<p>Todos os registros de alunos</p>";

$sql = "SELECT * FROM alunos";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    
    while($row = $result->fetch_assoc()) {
        echo "<h2>".$row['nome']."</h2>";

    }
} 

echo "Todos registros de cursos";

$sql1 = "SELECT * FROM cursos";
$result1 = $con->query($sql1);

if ($result1->num_rows > 0) {
    while($row = $result1->fetch_assoc()) {
        echo "<h2>".$row['nome']."</h2>"." ".$row['preco']."R$";
    }
} 

$con->close();

?> 
  
  <body>  
 <p><a href='../inserircursos.php'><button>Inserir algum curso</button></a></p>
 <p><a href='deslog.php'><button>Logout</button></a></p>
</body>