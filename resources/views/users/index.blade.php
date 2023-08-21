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
        
        /* Estilos para o formulário de pesquisa */
        form {
            margin-bottom: 20px;
        }
        
        input[type="text"] {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        
        button {
            padding: 8px 16px;
            background-color: #014572;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        li a {
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
        <h1>Listagem de usuários  <a href="{{ route('users.create') }}"><button>Adicionar</button></a></h1>
    </header>

    <div class="container">
        <form action="{{ route('users.index') }}" method="get">
            <input type="text" name="search" placeholder="Pesquisar">
            <button>Pesquisar</button>
        </form>

        <ul>
            @foreach ($users as $user)
                <li>
                    <span>
                        {{ $user->name }} - {{ $user->email }} | 
                    </span>
                    <span>
                        <a href="{{ route('users.show', $user->id) }}"><button>Detalhes</button></a>
                        <a href="{{ route('users.edit', $user->id) }}"><button>Editar</button></a>
                    </span>
                </li>
            @endforeach
        </ul>
    </div>

    <footer>
        <p>&copy; 2023 Todos os direitos reservados. Desenvolvido por <a href="https://github.com/DaniloLima0707">Danilo Lima</a></p>
    </footer>
</body>
</html>
