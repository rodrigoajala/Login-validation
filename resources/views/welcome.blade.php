<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem-vindo!</title>

    @isset($mensagemSucesso)
        <div class="alert alert-success custom-alert">
            {{$mensagemSucesso}}
        </div>
    @endisset

    <!-- Link para o Bootstrap -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0-alpha1/css/bootstrap.min.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            color: #333;
            padding-top: 30px;
            padding-bottom: 30px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            margin-top: 50px;
        }

        .card-body {
            padding: 30px;
        }

        .card-title {
            text-align: center;
            color: #4e73df;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .card-text {
            text-align: center;
            font-size: 18px;
            color: #555;
            margin-bottom: 20px;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            background-color: #4e73df;
            border: none;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #2e59d9;
        }

        .custom-alert {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
            max-width: 80%;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-body">
            <h2 class="card-title">Olá, {{$user->name}}!</h2>
            <p class="card-text">Seu código foi validado com sucesso!</p>
            <a href="{{ route('send.validation.code') }}" class="btn btn-primary">Ir para o Início</a>
        </div>
    </div>
</div>
</body>
</html>
