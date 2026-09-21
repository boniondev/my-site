<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Slow down.</title>
    @vite(['resources/css/app.css'])
    <style>

        #warning-429 {
            font-size: 0.60vw;
        }

        #warning-429-link {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

    </style>
</head>
<body>
    <div id="warning-429" class="abs-top-25-centered">You have sent too many requests. Wait 24 hours to ask another question, or, in case of logging in, wait a minute.</div>
    <a href="{{ route('landing') }}" class="sidebar-hyperlink" id="warning-429-link">Homepage</a>
</body>
</html>