<html lang="pt-br">
<head>
    <meta charset="utf-8" />
    <title>Horus</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">	
	      
    <link rel="stylesheet" type="text/css" href="src/css/main.css">        

    <!-- JQuery -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>    
    
</head>

<body class="page__bg">

<a href="avaliacao.php">NPS</a>
    
    <section class="page user grid grid--align-center">
        <form method="post" action="controllers/userController.php">
            <h3 class="title">Login</h3>

            <label>Email <span class="text-red">*</span></label>
                <input class="input" class="input" name="email" type="text">

            <label>Senha <span class="text-red">*</span></label>
                <input class="input" name="senha" type="password">

            <button class="btn__input" type="submit">Entrar</button>
        </form>
    </section>

</body>
</html>

