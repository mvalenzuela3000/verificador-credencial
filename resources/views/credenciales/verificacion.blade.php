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
            padding-bottom: 190px;
        }

        .logos {
            position: absolute;
            top: 58px;
            right: 45px;
            left: auto;
            width: 420px;
            display: flex;
            justify-content: flex-end;
            align-items: center;
            gap: 12px;
        }

        .logos img:first-child {
            height: 62px;
            width: auto;
        }

        .logos img:last-child {
            height: 62px;
            width: auto !important;
            max-width: 310px;
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
            top: 370px;
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
            z-index: 5;
        }

        .datos {
            position: absolute;
            top: 270px;
            right: 55px;
            width: 470px;
            text-align: right;
            z-index: 4;
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
            top: 415px;
            font-size: 15px;
            color: #555;
            z-index: 4;
        }

        .franja {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 18px;
            height: 145px;
            min-height: unset;
            background: #4a4a4a;
            color: #fff;
            display: grid;
            grid-template-columns: 58% 42%;
            align-items: center;
            padding: 14px 25px 18px 25px;
            z-index: 3;
        }

        .franja .cargo {
            text-align: center;
            padding: 0 15px;
            max-height: 130px;
            overflow: hidden;
        }

        .franja .cargo h2 {
            margin: 0 0 6px 0;
            font-size: clamp(18px, 2.1vw, 26px);
            line-height: 1.08;
            font-weight: 800;
            text-transform: uppercase;
        }

        .franja .cargo p {
            margin: 0 0 2px 0;
            font-size: clamp(13px, 1.45vw, 19px);
            line-height: 1.08;
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

            .page {
                align-items: flex-start;
                padding: 8px;
            }

            .credencial {
                max-width: 420px;
                min-height: auto;
            }

            .contenido {
                min-height: auto;
                padding: 95px 16px 0 16px;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .verificado {
                top: 22px;
                left: 22px;
                z-index: 5;
                font-size: 13px;
                padding: 8px 14px;
            }

            .logos {
                top: 34px;
                right: 18px;
                left: auto;
                width: 260px;
                justify-content: flex-end;
                gap: 5px;
            }

            .logos img:first-child {
                height: 42px;
            }

            .logos img:last-child {
                height: 42px;
                max-width: 205px;
            }

            .foto {
                position: relative;
                top: auto;
                left: auto;
                transform: none;
                width: 245px;
                height: 235px;
                margin-top: 25px;
            }

            .ci {
                position: relative;
                top: auto;
                left: auto;
                transform: none;
                width: 260px;
                height: 50px;
                margin-top: -12px;
                font-size: 24px;
                z-index: 4;
            }

            .datos {
                position: relative;
                top: auto;
                left: auto;
                right: auto;
                width: 100%;
                margin-top: 22px;
                margin-bottom: 24px;
                text-align: center;
            }

            .nombre {
                font-size: clamp(22px, 6.5vw, 30px);
                line-height: 1.08;
            }

            .cargo-principal {
                font-size: clamp(18px, 5vw, 24px);
                line-height: 1.15;
                margin-top: 6px;
            }

            .hashtag {
                display: none;
            }

            .franja {
                position: relative;
                width: calc(100% + 32px);
                margin: 0 -16px 18px -16px;
                min-height: 210px;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 20px 18px 28px 18px;
                background: #4a4a4a;
                z-index: 3;
            }

            .franja .cargo {
                width: 100%;
                padding: 0;
                max-height: none;
                overflow: visible;
                text-align: center;
            }

            .franja .cargo h2 {
                font-size: clamp(19px, 5.8vw, 26px);
                line-height: 1.22;
                margin: 0 0 10px 0;
            }

            .franja .cargo p {
                font-size: clamp(13px, 3.9vw, 18px);
                line-height: 1.20;
                margin: 0 0 5px 0;
            }

            .ministerio {
                display: none;
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
                <img src="{{ asset('img/credenciales/logo-ait.png') }}" alt="AIT">
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
                {{--<div class="cargo-principal">
                    {{ $cargo }}
                </div>--}}
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
