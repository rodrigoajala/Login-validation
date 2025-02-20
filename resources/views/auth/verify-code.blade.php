<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Verificar Código de Validação</title>

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
            padding: 30px;
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

        input[type="text"] {
            width: 100%;
            padding: 12px;
            margin: 8px 0 16px 0;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 14px;
            box-sizing: border-box;
        }

        input[type="text"]:focus {
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

        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
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
    <h1>Verifique seu Código de Validação</h1>

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

    @if(session('success'))
        <div class="alert alert-success">
            <strong>Sucesso:</strong> {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('verify.validation.code') }}" method="POST">
        @csrf
        <label for="validation_code">Código de Validação:</label>
        <input type="text" name="validation_code" id="validation_code" placeholder="Código de Validação" required>

        <button type="submit">Verificar Código</button>
    </form>

    <div class="form-footer">
        <p>Não recebeu o código? <a href="{{ route('send.validation.code') }}">Clique aqui para reenviar o código.</a></p>
    </div>
</div>

</body>
</html>
