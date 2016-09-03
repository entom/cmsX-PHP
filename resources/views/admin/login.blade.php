<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>CMSX</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="/dashboard/css/style.css" type="text/css">

    <script src="/dashboard/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="/dashboard/node_modules/materialize-css/dist/js/materialize.min.js"></script>
    <script src="/dashboard/bower_components/jquery-backstretch-2/jquery.backstretch.js"></script>
    <script src="/dashboard/js/init.js"></script>
</head>
<body>
<main class="pl0">
    <div class="row">
        <div class="col s12 m4 offset-m4">
            <div class="card card__login">
                <div class="card__header card__header--color">
                    <span class="title">
                        Logowanie
                    </span>
                </div>
                <div class="card-content">
                    <form role="form" method="POST" class="row" action="{{ url('/admin/login') }}">
                        {{ csrf_field() }}
                        <div class="input-field col s10 {{ $errors->has('email') ? ' has-error' : '' }}">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif

                            <i class="material-icons prefix">account_circle</i>
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" autofocus>
                            <label for="login">Adres email</label>
                        </div>

                        <div class="input-field col s10 {{ $errors->has('password') ? ' has-error' : '' }}">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif

                            <i class="material-icons prefix">lock</i>
                            <input id="password" type="password" class="form-control" name="password">
                            <label for="pass">Hasło</label>
                        </div>

                        <div class="input-field col s2">
                            <button type="submit" class="btn-floating btn-large btn__card--next waves-effect waves-light red">
                                <i class="material-icons">trending_flat</i>
                            </button>
                        </div>

                        <div class="input-field col s10">
                            <a href="/" class="login__link">Zapomniałeś hasła ?</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    $.backstretch([
        "/dashboard/images/login-bg.jpg",
        "/dashboard/images/login-bg1.jpg"
    ], {duration: 6000, fade: 2000});
</script>

</body>
</html>