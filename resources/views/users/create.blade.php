<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Usuário</title>
    
    <style>
        /* Estilos para o layout geral */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Faz com que o conteúdo ocupe pelo menos a altura da viewport */
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            flex: 1; /* Permite que o conteúdo ocupe todo o espaço disponível verticalmente */
        }
        
        /* Estilos para o cabeçalho */
        header {
            background-color: #3498db;
            color: white;
            padding: 20px;
            text-align: center;
        }
        
        /* Estilos para mensagens de erro */
        .errors {
            background-color: #f2dede;
            border: 1px solid #ebccd1;
            color: #a94442;
            padding: 10px;
            margin-bottom: 20px;
        }
        
        /* Estilos para campos de entrada e botões */
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 10px;
            width: 100%;
        }
        
        button {
            padding: 8px 16px;
            background-color: #014572;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        /* Estilos para o rodapé */
        footer {
            background-color: #3498db;
            color: white;
            text-align: center;
            padding: 10px;
        }
        /* Estilos para links no rodapé */
        footer a {
            color: white;
            text-decoration: underline;
        }
        
    </style>
</head>
<body>
    <header>
        <h1>Novo Usuário</h1>
    </header>

    <div class="container">
        @if ($errors->any())
            <ul class="errors">
                @foreach ($errors->all() as $error)
                    <li class="error">{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('users.store') }}" method="post">
            @csrf
            <input type="text" name="name" placeholder="Nome:" value="{{ old('name') }}">
            <input type="email" name="email" placeholder="E-mail:" value="{{ old('email') }}">
            <input type="password" name="password" placeholder="Senha:">
            <button type="submit">Enviar</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2023 Todos os direitos reservados. Desenvolvido por <a href="https://github.com/DaniloLima0707">Danilo Lima</a></p>
    </footer>
</body>
</html>
