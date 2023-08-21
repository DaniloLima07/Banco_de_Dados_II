<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem do Usuário</title>
    
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
            margin-bottom: 20px;
        }
        
        /* Estilos para a lista de usuários */
        ul {
            list-style: none;
            padding: 0;
        }
        
        li {
            background-color: white;
            padding: 10px;
            border: 1px solid #ccc;
            margin-bottom: 10px;
        }
        
        /* Estilos para botões */
        button {
            padding: 8px 16px;
            background-color: #014572;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        /* Estilos para links */
        a {
            text-decoration: none;
            color: #3498db;
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
        <h1>Listagem do usuário - {{ $user->name }}</h1>
    </header>

    <div class="container">
        <ul>
            <li>{{ $user->name }}</li>
            <li>{{ $user->email }}</li>
        </ul>

        <form action="{{ route('users.destroy', $user->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit">Deletar</button>
        </form>
    </div>

    <footer>
        <p>&copy; 2023 Todos os direitos reservados. Desenvolvido por <a href="https://github.com/DaniloLima0707">Danilo Lima</a></p>
    </footer>
</body>
</html>
