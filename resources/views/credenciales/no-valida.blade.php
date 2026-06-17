<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credencial no válida - AIT</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            background: #f1f1f1;
            font-family: Arial, Helvetica, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            color: #333;
        }

        .card {
            width: 100%;
            max-width: 620px;
            background: #fff;
            border-radius: 14px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,.18);
            text-align: center;
        }

        .header {
            background: #1f2f5f;
            padding: 28px 20px;
        }

        .header img {
            max-height: 80px;
        }

        .content {
            padding: 40px 35px;
        }

        .icon {
            width: 90px;
            height: 90px;
            margin: 0 auto 20px auto;
            border-radius: 50%;
            background: #d71920;
            color: #fff;
            font-size: 55px;
            font-weight: 800;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h1 {
            margin: 0 0 15px 0;
            font-size: 30px;
            color: #d71920;
            text-transform: uppercase;
        }

        p {
            margin: 0;
            font-size: 20px;
            line-height: 1.5;
        }

        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
            font-size: 15px;
            color: #666;
        }

        .barra {
            height: 6px;
            background: linear-gradient(to right, #d71920 0%, #d71920 33%, #f5df00 33%, #f5df00 66%, #00843d 66%, #00843d 100%);
        }
    </style>
</head>
<body>

<div class="card">
    <div class="barra"></div>

    <div class="header">
        <img src="{{ asset('img/credenciales/logo-ait-blanco.png') }}" alt="Autoridad de Impugnación Tributaria">
    </div>

    <div class="content">
        <div class="icon">!</div>

        <h1>Credencial no válida</h1>

        <p>
            {{ $mensaje ?? 'La credencial consultada no se encuentra registrada o no está vigente.' }}
        </p>

        <div class="footer">
            Autoridad de Impugnación Tributaria<br>
            Sistema de Verificación de Credenciales Institucionales
        </div>
    </div>
</div>

</body>
</html>
