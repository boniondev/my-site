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
    <title>Landing</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <div id="disclaimer">
        <div id="disclaimer-text">
            This site <b>requires Javascript to be enabled</b>. <br>
            This site uses cookies strictly for CSRF protection. No tracking is performed. No analytics is collected. <br>
            This site can <b>collect and store your hashed IP for up to 24 hours</b> to enforce rate limiting. After such time limit expires, the record is removed within 10 minutes.<br>
            This site does not obfuscate or minify served HTML, Javascript and CSS. They are human readable. <br>
            This site prioritizes performance, readability and ease of use over style and may look simplistic. <br>
            This site was built by a human. <br>
            The source code of this site is released under AGPL and can be found <a href="https://github.com/boniondev/my-site" target="_blank" rel="noreferrer">here</a>
        </div>
        <button type="button" id="disclaimer-acknowledge">I understand</button>
    </div>
    <div id="content" hidden>
        @include("sidebar")
        <div id="content-text">
            <p>
                Hello. I am bonion, or boniondev. I am a fan of high level programming, including but not limited to, in no particular order: GDScript, Python, C++, Lua, JS, PHP. <br>
                I dabble in game dev (Godot Engine) and web development (mostly Laravel). <br>
                I am also interested in multithreading and UDP connectivity.
            </p>
            <p>
                Navigation of the site can be done by using the sidebar on the left.
            </p>
        </div>
    </div>
<script>
    const disclaimer = document.getElementById("disclaimer")
    const disclaimerAcknowledgeButton = document.getElementById("disclaimer-acknowledge")
    const content = document.getElementById("content")
    if (localStorage.getItem("disclaimer_acknowledged") === "1")  {
        disclaimer.remove()
        content.hidden = false
    } else {
        disclaimerAcknowledgeButton.addEventListener('click', function () {
            disclaimer.remove()
            content.hidden = false
            localStorage.setItem("disclaimer_acknowledged", "1")
        })
    }

</script>
</body>
</html>