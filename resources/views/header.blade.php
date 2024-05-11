<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .header-container {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-title {
            font-size: 24px;
            margin-right: 0px; /* Separación del título a la izquierda */
        }

        .nav-menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
        }

        .nav-menu li {
            padding: 0 10px;
        }

        .nav-menu li a {
            color: white;
            text-decoration: none;
        }

        .nav-menu li a:hover {
            text-decoration: underline;
        }

        /* Dropdown Menu */
        .dropdown-menu {
            position: absolute;
            background-color: #333;
            z-index: 1;
            display: none;
        }

        .dropdown-menu li {
            padding: 10px;
        }

        .dropdown:hover .dropdown-menu {
            display: block;
        }

        body {
        margin: 0;
        font-family: Arial, sans-serif;
    }
    </style>
</head>

<body>
    <header>
        <div class="header-container">
            <div class="header-title">Techtopia</div>
            <nav>
                <ul class="nav-menu">
                    <li><a href="/">Inicio</a></li>
                    <li class="dropdown">
                        <a href={{route('ShowCategorias')}}>Categorias</a>
                        <ul class="dropdown-menu">
                            @foreach ($categorias as $categoria)
                            <li><a href="{{ route('productosPorCategoria', $categoria->id) }}">{{ $categoria->nombre }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li><a href="/listar-productos">Productos</a></li>
                        @auth
                            @if(auth()->user()->rol == 'Supervisor')
                                <li><a href="#">SPRVISOR1</a></li>
                                <li><a href="#">SPRVISOR2</a></li>
                                <li><a href="#">SPRVISOR3</a></li>
                            
                            @elseif(auth()->user()->rol == 'Encargado')
                                <li><a href="#">Encargado1</a></li>
                                <li><a href="#">Encargado1</a></li>
                                <li><a href="#">Encargado1</a></li>
                            
                            @elseif(auth()->user()->rol == 'Vendedor')
                                <li><a href="#">Vendedor1</a></li>
                                <li><a href="#">Vendedor2</a></li>
                                <li><a href="#">Vendedor3</a></li>
                            
                            @elseif(auth()->user()->rol == 'Contador')
                                <li><a href="#">Contador1</a></li>
                                <li><a href="#">Contador</a></li>
                                <li><a href="#">Contador</a></li>
                            
                            @endif
                        @endauth
                    
                </ul>
            </nav>
            <!-- Iniciar sesión, cerrar sesión y registrarse a la derecha -->
            <nav>
                <ul class="nav-menu">
                    @auth
                        <li><a href="{{ route('login.out') }}">Cerrar sesión</a></li>
                    @else
                        <li><a href="{{ route('login.store') }}">Iniciar sesión</a></li>
                        <li><a href="{{ route('user.register') }}">Registrarse</a></li>
                    @endauth
                </ul>
            </nav>
        </div>
    </header>
</body>

</html>
