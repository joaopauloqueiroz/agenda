<!DOCTYPE html>
<?php


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <title>Criar</title>
</head>
<body>

<div class="container">
    <h1>Criar um novo usuário</h1>
    <div class="row">
    <form action="novo-usuario.php" class="form" method="post">
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Qual o seu nome?" name="name">
        </div>
        <div class="form-group">
            <input type="email" class="form-control" placeholder="Seu melhor email" name="email">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Senha" name="senha">
        </div>
        <input type="submit" class="btn btn-success" value="Salvar">
    </form>
</div>
</div>
    
</body>
</html>