<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Laravel</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

    <!-- Styles -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 20px;
        }
        form .row {
            display: block;
            padding: 7px 8px;
            margin-bottom: 7px;
        }
        form .row:hover {
            background: #f1f7fa;
        }
        form label {
            display: inline-block;
            font-size: 1.2em;
            font-weight: bold;
            width: 150px;
            padding: 6px 0;
            color: #464646;
            vertical-align: top;
        }
        form .req { color: #ca5354; }
        form .note {
            font-size: 1.2em;
            line-height: 1.33em;
            font-weight: normal;
            padding: 2px 7px;
            margin-bottom: 10px;
        }
        form input:focus { outline: none; }
        ::-webkit-input-placeholder { color: #aaafbd; font-style: italic; }
        :-moz-placeholder { color: #aaafbd; font-style: italic; }
        ::-moz-placeholder { color: #aaafbd; font-style: italic; }
        :-ms-input-placeholder { color: #aaafbd; font-style: italic; }
        form .txt {
            display: inline-block;
            padding: 8px 9px;
            padding-right: 30px;
            width: 240px;
            font-family: 'Oxygen', sans-serif;
            font-size: 1.35em;
            font-weight: normal;
            color: #898989;
            background-color: #f0f0f0;
            background-position: 110% center;
            background-repeat: no-repeat;
            border: 1px solid #ccc;
            text-shadow: 0 1px 0 rgba(255,255,255,0.75);
            -webkit-box-sizing: content-box;
            -moz-box-sizing: content-box;
            box-sizing: content-box;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border-radius: 3px;
            -webkit-box-shadow: 0 1px 2px rgba(25, 25, 25, 0.25) inset, -1px 1px #fff;
            -moz-box-shadow: 0 1px 2px rgba(25, 25, 25, 0.25) inset, -1px 1px #fff;
            box-shadow: 0 1px 2px rgba(25, 25, 25, 0.25) inset, -1px 1px #fff;
            -webkit-transition: all 0.3s linear;
            -moz-transition: all 0.3s linear;
            transition: all 0.3s linear;
        }
        .btn {
            background-color: #008CBA;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }

        .btnR {
            margin-top: 10px;
            background-color: red;
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }

        .custom-dropdown {
            position: relative;
            display: inline-block;
            vertical-align: middle;
            margin: 10px; /* demo only */
        }

        .custom-dropdown select {
            background-color: #1abc9c;
            color: #fff;
            font-size: inherit;
            padding: .5em;
            padding-right: 2.5em; 
            border: 0;
            margin: 0;
            border-radius: 3px;
            text-indent: 0.01px;
            text-overflow: '';
            -webkit-appearance: button; /* hide default arrow in chrome OSX */
        }

        .custom-dropdown::before,
        .custom-dropdown::after {
            content: "";
            position: absolute;
            pointer-events: none;
        }

        .custom-dropdown::after { /*  Custom dropdown arrow */
            content: "\25BC";
            height: 1em;
            font-size: .625em;
            line-height: 1;
            right: 1.2em;
            top: 50%;
            margin-top: -.5em;
        }

        .custom-dropdown::before { /*  Custom dropdown arrow cover */
            width: 2em;
            right: 0;
            top: 0;
            bottom: 0;
            border-radius: 0 3px 3px 0;
        }

        .custom-dropdown select[disabled] {
            color: rgba(0,0,0,.3);
        }

        .custom-dropdown select[disabled]::after {
            color: rgba(0,0,0,.1);
        }

        .custom-dropdown::before {
            background-color: rgba(0,0,0,.15);
        }

        .custom-dropdown::after {
            color: rgba(0,0,0,.4);
        }
        .custom-dropdown {
            position: relative;
            display: inline-block;
            vertical-align: middle;
            margin: 10px; /* demo only */
        }

        .custom-dropdown select {
            background-color: #1abc9c;
            color: #fff;
            font-size: inherit;
            padding: .5em;
            padding-right: 2.5em; 
            border: 0;
            margin: 0;
            border-radius: 3px;
            text-indent: 0.01px;
            text-overflow: '';
            -webkit-appearance: button; /* hide default arrow in chrome OSX */
        }

        .custom-dropdown::before,
        .custom-dropdown::after {
            content: "";
            position: absolute;
            pointer-events: none;
        }

        .custom-dropdown::after { /*  Custom dropdown arrow */
            content: "\25BC";
            height: 1em;
            font-size: .625em;
            line-height: 1;
            right: 1.2em;
            top: 50%;
            margin-top: -.5em;
        }

        .custom-dropdown::before { /*  Custom dropdown arrow cover */
            width: 2em;
            right: 0;
            top: 0;
            bottom: 0;
            border-radius: 0 3px 3px 0;
        }

        .custom-dropdown select[disabled] {
            color: rgba(0,0,0,.3);
        }

        .custom-dropdown select[disabled]::after {
            color: rgba(0,0,0,.1);
        }

        .custom-dropdown::before {
            background-color: rgba(0,0,0,.15);
        }

        .custom-dropdown::after {
            color: rgba(0,0,0,.4);
        }

        .message {
            margin-bottom: 10px;
            color: red;
        }

        .ketQua p {
            color: #0000FF;
            margin-right: 10px;
        }

        .ketQua {
            margin-right: 10px;
        }

        @-webkit-keyframes my {
         0% { color: #F8CD0A; } 
         50% { color: #ffffff;  } 
         100% { color: #F8CD0A;  } 
     }
     @-moz-keyframes my { 
         0% { color: #F8CD0A;  } 
         50% { color: #ffffff;  }
         100% { color: #F8CD0A;  } 
     }
     @-o-keyframes my { 
         0% { color: #F8CD0A; } 
         50% { color: #ffffff; } 
         100% { color: #F8CD0A;  } 
     }
     @keyframes my { 
         0% { color: #F8CD0A;  } 
         50% { color: #ffffff;  }
         100% { color: #F8CD0A;  } 
     } 
     .test {
         background:#3d3d3d;
         font-size:24px;
         font-weight:bold;
         -webkit-animation: my 700ms infinite;
         -moz-animation: my 700ms infinite; 
         -o-animation: my 700ms infinite; 
         animation: my 700ms infinite;
     }

     @keyframes my { 
         0% { color: #F8CD0A;  } 
         50% { color: #ffffff;  }
         100% { color: #e3342f;  } 
     }

     @keyframes my { 
         0% { color: #F8CD0A;  } 
         50% { color: #ffffff;  }
         100% { color: #F8CD0A;  } 
     }
     .test {
         background: red;
         font-size:24px;
         font-weight:bold;
         -webkit-animation: my 700ms infinite;
         -moz-animation: my 700ms infinite; 
         -o-animation: my 700ms infinite; 
         animation: my 700ms infinite;
     }
     .test {
        border-radius:50%;
        -moz-border-radius:50%;
        -webkit-border-radius:50%;
        padding: 5px 2px 5px 2px;
        margin-left: 10px;
    }
</style>
</head>
<body>
    <div id="app">
        <example-component></example-component>
    </div>
</body>
</html>
