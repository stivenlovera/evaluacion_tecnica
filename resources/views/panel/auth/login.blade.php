<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Evaluacion tercnica | </title>

    <!-- Bootstrap -->
    <link href="{{ asset('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ asset('vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('build/css/custom.min.css') }}" rel="stylesheet">
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">
                    <form method="POST" action="{{ route('auth') }}">
                        @csrf
                        @method('POST')
                        <h1>Iniciar</h1>
                        <div>
                            <input type="text" name="usuario" c class="form-control" placeholder="Usuario"
                                required="" />
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="contraseña"
                                required="" />
                        </div>
                        <div>
                            <button class="btn btn-success" type="Submit">Iniciar</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Eres nuevo en este sitio?
                                {{-- <a href="#signup" class="to_register"> CREAR CUENTA! </a> --}}
                            </p>

                            <div class="clearfix"></div>
                            <br />


                        </div>
                    </form>
                </section>
            </div>

            <div id="register" class="animate form registration_form">
                <section class="login_content">
                    <form>
                        <h1>Create cuenta</h1>
                        <div>
                            <input type="text" name="usuario" class="form-control" placeholder="Usuario"
                                required="" />
                        </div>
                        <div>
                            <input type="email" name="email" class="form-control" placeholder="Email"
                                required="" />
                        </div>
                        <div>
                            <input type="password" name="password" class="form-control" placeholder="Contraseña"
                                required="" />
                        </div>
                        <div>
                            <button class="btn btn-success" id="" type="button">Registrar</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <p class="change_link">Y esta registrado ?
                                <a href="" class="to_register"> INICIA AQUI </a>
                            </p>

                            <div class="clearfix"></div>
                            <br />

                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>
</html>
