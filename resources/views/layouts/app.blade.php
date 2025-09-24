<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Envio de Currículo</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    
    <style> body { font-family: 'Poppins', sans-serif; } </style>
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gradient-to-l from-[#000d4d] to-[#000f66] flex items-center justify-center min-h-screen p-4">

    <main>
        @yield('content')
    </main>

</body>
</html>