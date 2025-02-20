<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Enviar Código de Validação</title>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f7fa;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        h1 {
            text-align: center;
            color: #4e73df;
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            margin-bottom: 5px;
            display: block;
            color: #555;
        }

        input[type="email"], input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0 16px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            box-sizing: border-box;
        }

        input[type="email"]:focus, input[type="password"]:focus {
            border-color: #4e73df;
            outline: none;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #4e73df;
            border: none;
            color: white;
            font-size: 16px;
            border-radius: 8px;
            cursor: pointer;
            box-sizing: border-box;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #2e59d9;
        }

        .alert {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert strong {
            font-weight: bold;
        }

        .form-footer {
            text-align: center;
            margin-top: 20px;
        }

        .form-footer a {
            color: #4e73df;
            text-decoration: none;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Login</h1>

    @if($errors->any())
        <div class="alert">
            <strong>Erro:</strong>
            <ul>
                @foreach($errors->all() as $message)
                    <li>{{ $message }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('send.validation.code') }}" method="POST">
        @csrf
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" placeholder="Seu e-mail" required>

        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" placeholder="Sua senha" required>

        <button type="submit">Enviar Código</button>
    </form>

    <div class="form-footer">
        <p>Já recebeu o código? <a href="{{ route('verify.validation.code') }}">Clique aqui para inserir o código.</a></p>
    </div>
</div>

</body>
</html>
