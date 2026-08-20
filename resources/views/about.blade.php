<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <div id="content">
        @include("sidebar")
        <div id="content-text">
            <p>
                This site is powered by Laravel 13.<br>
                This site uses 0xProto, released under OFL 1.1.<br>
                The source code for this site is released under AGPLv3 and can be found <a href="https://github.com/boniondev/my-site" target="_blank" rel="noopener noreferrer">here</a>.
            </p>
        </div>
    </div>
</body>
</html>