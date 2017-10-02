<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Importador</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        {{ Form::open(['url' => 'extract']) }}
            <div class="flex-center position-ref full-height">
                <div class="content">
                    <div class="title m-b-md">
                        Importar
                    </div>

                    <div class="links">
                        <a href="home">Inicio</a>
                        <a href="convert">Convertir a texto</a>
                        <br/><br/>
                        @if(file_exists(public_path().'/pdf2txt/file.pdf'))
                            <label for="">Hay un archivo para trabajar</label>
                            <br/><br/>
                            {{ Form::submit('Import &raquo;') }}
                        @else
                            <label for="">No hay ningún archivo para trabajar</label>
                        @endif
                    </div>
                    </hr>
                    
                </div>
            </div>
        {{ Form::close() }}
    </body>
</html>
