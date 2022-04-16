<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        @stack('styles')

        <!-- Scripts -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        @stack('scripts')

        <script src="{{ asset('js/app.js') }}" defer></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
            canvas{
                background-color: red;
            }
        </style>
    </head>
    <body class="antialiased">
        <div class="uk-container">
            <div class="uk-text-center">
                <canvas id="myCanvas" height='500' width='300'></canvas>
            </div>
            <div class="uk-flex uk-flex-center uk-margin-medium-top">
                <button id="turn-btn" class="uk-button uk-button-primary">Turn</button>
                <button id="increase-btn" class="uk-button uk-button-primary uk-margin-small-left">Increase</button>
            </div>
        </div>
    </body>

    <script>
        const canvas = document.getElementById("myCanvas");
        const ctx = canvas.getContext("2d");

        const degreeStep = 10;
        const widthStep = 40;
        let degrees = 0;
        let width = 100;
        let height = 100;
        let offsetWidth = canvas.width/2 - width/2;
        let offsetHeight = canvas.height/2 - height/2;
        ctx.fillStyle='#333';

        ctx.save();
        ctx.fillRect(offsetWidth,offsetHeight,width,height);
        ctx.restore();

        function turn() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            ctx.save();
            ctx.translate(offsetWidth+width/2, offsetHeight+height/2);
            ctx.rotate(degrees*Math.PI/180);
            ctx.fillRect(-width/2, -height/2, width, height);
            ctx.restore();
        }

        function increase() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            offsetWidth = canvas.width/2 - width/2;
            offsetHeight = canvas.height/2 - height/2;
            ctx.save();
            ctx.translate(offsetWidth+width/2, offsetHeight+height/2);
            ctx.rotate(degrees*Math.PI/180);
            ctx.fillRect(-width/2, -height/2, width, height);
            ctx.restore();
        }


        const turnBtn = document.getElementById('turn-btn');
        const increaseBtn = document.getElementById('increase-btn');

        turnBtn.onclick = function() {
            degrees += degreeStep;
            turn();
        };

        increaseBtn.onclick = function() {
            width += widthStep;
            increase();
        };
    </script>

</html>
