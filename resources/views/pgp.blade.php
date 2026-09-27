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
    <title>PGP</title>
    @vite(['resources/css/app.css'])
    <style>

        #pgp-key-div {
            border: 0.2vw solid white;
            width: fit-content;
            padding-left: 0.5vw;
            padding-right: 0.5vw;
        }

    </style>
</head>
<body>
    <div id="content">
        @include('sidebar')
        <div id="content-text">
            Below is my PGP key. As of 2026/09/15, I use it for most things that accept or require PGP keys (Git commit signing, AUR profile PGP fingerprint)<br>
            The key us also available under <a href="http://keyserver.ubuntu.com" target="_blank" rel="noreferrer">keyserver.ubuntu.com</a>.<br>
            <?php $metadata = json_decode(file_get_contents(public_path('key/metadata.json')),true) ?>
            Fingerprint: <?= $metadata['fingerprint'] ?><br>
            <div id="pgp-key-div">
                <pre>
                    <code>
                        <?= file_get_contents(public_path('key/boniondev-public.asc')) ?>
                    </code>
                </pre>
            </div>
        </div>
    </div>
@vite('resources/js/disclaimerRedirect.js')
</body>
</html>