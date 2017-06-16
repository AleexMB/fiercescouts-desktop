<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Fiercescouts</title>

        <!-- <link rel="stylesheet" href="/css/base.css"> -->

        <style>

        @font-face{
            font-family: maisonneuebook;
            src: url("../../fonts/maisonneuebook.ttf");
        }

            html, body {
                background-color: #21282E
                color: #636b6f;
                font-family:'maisonneuebook',sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
                overflow: hidden;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
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
                font-family: 'Breathe Fire';
                color: #fff;
            }

            .links > a {
                color: #fff;
                padding: 0 25px;
                font-size: 12px;
                font-family: 'maisonneuebook', sans-serif;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            .bg{
              height: 100vh;
              color: #21282E;
              background: #21282E;
              background: linear-gradient(-90deg,  #21282E, #32373C);
              background: -webkit-linear-gradient(-90deg, #21282E, #32373C); /* For Safari 5.1 to 6.0 */
              background: -o-linear-gradient(-90deg, #21282E, #32373C); /* For Opera 11.1 to 12.0 */
              background: -moz-linear-gradient(-90deg, #21282E, #32373C); /* For Firefox 3.6 to 15 */
            }

            .splashImg {
                position: fixed;
                width: 100%;
            }
        </style>
    </head>
    <body>
      <div class="bg">
        <!-- <img class="splashImg" src="{{URL::asset('/images/splash2.jpg')}}" alt="character"> -->
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ url('/login') }}">Login</a>
                        <a href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif
            <div class="content">
                <div class="col-lg-6">
                    
                </div>
                <div class="title m-b-md col-lg-6">
                    Fierce <br> Scouts
                </div>
            </div>
        </div>
      </div>
    </body>
</html>
