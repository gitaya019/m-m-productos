<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome | Panel Administrativo</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .welcome-card {
            background-color: white;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .welcome-title {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
        }
        .welcome-text {
            font-size: 1.2rem;
            margin-bottom: 20px;
            color: #666;
        }
        .btn-custom {
            background-color: #007bff;
            color: white;
            font-size: 1.1rem;
            padding: 10px 20px;
            border-radius: 50px;
        }
        .btn-custom:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="welcome-card">
        <h1 class="welcome-title">Bienvenido al Panel Administrativo</h1>
        <p class="welcome-text">Gestiona todos los aspectos de tu sistema de manera sencilla y rápida.</p>
        <a href="/admin/login" class="btn btn-custom">Ir al Login</a>
    </div>

    <!-- Bootstrap JS (opcional, para funcionalidad de scripts) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
