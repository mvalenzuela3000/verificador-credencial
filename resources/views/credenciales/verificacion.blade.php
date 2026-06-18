<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Credencial Verificada - AIT</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            background: #e9e9e9;
            font-family: Arial, Helvetica, sans-serif;
            color: #4b4b4b;
        }

        .page {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .credencial{
            width:100%;
            max-width:980px;
            min-height:610px;
            position:relative;
            overflow:hidden;
            background:#fbf7e8;
            box-shadow:0 8px 30px rgba(0,0,0,.25);
        }

        .credencial::after{
            content:"";
            position:absolute;
            left:0;
            bottom:0;
            width:100%;
            height:6px;
            background:linear-gradient(
                to right,
                #d71920 0%,
                #d71920 33.333%,
                #f5df00 33.333%,
                #f5df00 66.666%,
                #00843d 66.666%,
                #00843d 100%
            );
            z-index:20;
        }

        .credencial::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image: url("{{ asset('img/credenciales/fondo-ait.png') }}");
            background-size: cover;
            background-position: center;
            opacity: .45;
            z-index: 1;
        }

        .contenido {
            position: relative;
            z-index: 2;
            min-height: 610px;
        }

        .logos {
            position: absolute;
            top: 58px;
            right: 45px;
            display: flex;
            align-items: center;
            gap: 18px;
        }

        .logos img {
            height: 78px;
            object-fit: contain;
        }

        .foto {
            position: absolute;
            top: 126px;
            left: 116px;
            width: 290px;
            height: 255px;
            background: #fff;
            border-radius: 4px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .foto img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .ci {
            position: absolute;
            top: 390px;
            left: 116px;
            width: 292px;
            height: 53px;
            background: #1f2f5f;
            color: #fff;
            border-radius: 25px;
            font-size: 30px;
            font-weight: 700;
            display: flex;
            align-items: center;
            justify-content: center;
            letter-spacing: .5px;
        }

        .datos {
            position: absolute;
            top: 275px;
            right: 55px;
            width: 470px;
            text-align: right;
        }

        .nombre {
            font-size: 35px;
            line-height: 1.03;
            font-weight: 800;
            text-transform: uppercase;
            color: #4b4b4b;
        }

        .cargo-principal {
            margin-top: 4px;
            font-size: 29px;
            line-height: 1.1;
            color: #555;
        }

        .hashtag {
            position: absolute;
            right: 80px;
            top: 448px;
            font-size: 15px;
            color: #555;
        }

        .franja {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 18px;
            height: 110px;
            background: #4a4a4a;
            color: #fff;
            display: grid;
            grid-template-columns: 58% 42%;
            align-items: center;
        }

        .franja .cargo {
            text-align: center;
            padding-left: 25px;
        }

        .franja .cargo h2 {
            margin: 0 0 4px 0;
            font-size: 27px;
            font-weight: 800;
            text-transform: uppercase;
        }

        .franja .cargo p {
            margin: 0;
            font-size: 21px;
            font-weight: 700;
            text-transform: uppercase;
        }

        .ministerio {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .ministerio img {
            max-height: 72px;
            max-width: 310px;
            object-fit: contain;
        }

        .verificado {
            position: absolute;
            left: 20px;
            top: 20px;
            background: #00843d;
            color: #fff;
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: 700;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .credencial {
                max-width: 420px;
                min-height: 720px;
            }

            .credencial::before {
                background-size: cover;
            }

            .contenido {
                min-height: 720px;
            }

            .logos {
                position: absolute;
                top: 35px;
                right: 35px;
                display: flex;
                justify-content: flex-end;
                align-items: center;
                gap: 12px;
                width: auto;
                left: auto;
            }

            .logos img {
                height: 65px;
                width: auto;
                object-fit: contain;
            }

            .foto {
                top: 120px;
                left: 50%;
                transform: translateX(-50%);
                width: 245px;
                height: 235px;
            }

            .ci {
                top: 365px;
                left: 50%;
                transform: translateX(-50%);
                width: 260px;
                font-size: 24px;
            }

            .datos {
                top: 440px;
                right: auto;
                left: 20px;
                width: calc(100% - 40px);
                text-align: center;
            }

            .nombre {
                font-size: 25px;
            }

            .cargo-principal {
                font-size: 21px;
            }

            .hashtag {
                display: none;
            }

            .franja {
                height: 130px;
                grid-template-columns: 1fr;
                bottom: 18px;
                padding: 10px;
            }

            .franja .cargo {
                padding: 0;
            }

            .franja .cargo h2 {
                font-size: 22px;
            }

            .franja .cargo p {
                font-size: 16px;
            }

            .ministerio img {
                max-height: 48px;
            }
        }
    </style>
</head>
<body>

@php
    $ci = trim($persona->ci . ($persona->ci_complemento ? ' ' . $persona->ci_complemento : ''));
    $nombreCompleto = $persona->nombre_completo;
    $cargo = $persona->cargo ?? '';
    $area = $persona->area ?? '';
    $puesto = $persona->puesto ?? '';
    $oficina=$persona->oficina ?? '';
    $imagen = $persona->imagen ?: asset('img/credenciales/sin-foto.png');
@endphp

<div class="page">
    <div class="credencial">
        <div class="contenido">

            <div class="verificado">
                CREDENCIAL VERIFICADA
            </div>

            <div class="logos">
                <img src="{{ asset('img/credenciales/escudo.png') }}" alt="Escudo Bolivia">
                <img src="{{ asset('img/credenciales/logo-ait.png') }}" width="50%" alt="AIT">
            </div>

            <div class="foto">
                <img src="{{ $imagen }}" alt="Fotografía de {{ $nombreCompleto }}">
            </div>

            <div class="ci">
                C.I.: {{ $ci }}
            </div>

            <div class="datos">
                <div class="nombre">
                    {{ $nombreCompleto }}
                </div>
                <div class="cargo-principal">
                    {{ $cargo }}
                </div>
            </div>

            <div class="hashtag">
                #Siempre <strong>Bolivia</strong>
            </div>

            <div class="franja">
                <div class="cargo">
                    <h2>{{ $puesto ?: $cargo }}</h2>
                    <p>{{ $area }}</p>
                    <p>{{ $oficina }}</p>
                </div>

                <div class="ministerio">
                    {{--<img src="{{ asset('img/credenciales/logo-ministerio.png') }}" alt="Ministerio de Economía y Finanzas Públicas">--}}
                </div>
            </div>

        </div>
    </div>
</div>

</body>
</html>
