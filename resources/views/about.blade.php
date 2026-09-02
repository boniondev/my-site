{{--
    This Source Code does not contain AI generated code.
    If downstream edits involve AI generated code, please update or remove this header.

    Copyright © 2026 boniondev

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Affero General Public License as
    published by the Free Software Foundation, either version 3 of the
    License, or (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
    See the GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with this program. If not, see <https://www.gnu.org/licenses/>.
--}}
@include("license")
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