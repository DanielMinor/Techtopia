<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;
        }

        .footer-container {
            background-color: #333;
            color: white;
            padding: 20px;
            text-align: center;
            width: 100%;
            bottom: 0;
            position: fixed;
        }
    </style>
</head>
<body>
    
    <footer>
        <div class="footer-container">
            <p>&copy; {{ date('Y') }} Techtopia. Todos los derechos reservados.</p>
        </div>
    </footer>

