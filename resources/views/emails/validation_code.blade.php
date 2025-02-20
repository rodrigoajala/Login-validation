<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Código de Validação</title>
</head>
<body>
@if($errors->any())
    <div style="color: red; margin-bottom: 20px;">
        {{ implode('', $errors->all(':message')) }}
    </div>
@endif

<h2>Seu Código de Validação</h2>
<p>Olá!</p>
<p>O seu código de validação é: <strong>{{ $validationCode }}</strong></p>
<p>Este código expira em 10 minutos. Caso não tenha solicitado este código, desconsidere este e-mail.</p>
<p>Atenciosamente,<br>Equipe Exemplo</p>
</body>
</html>
