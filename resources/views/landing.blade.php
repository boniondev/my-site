<!--
    Copyright © 2026 boniondev

    This Source Code does not contain AI generated code.
    The original author does not endorse nor condone downstream edits adding AI generated code.
    If downstream edits involve AI generated code, please update or remove this header.

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
-->
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
        <p>
            This site requires Javascript to be enabled. <br>
            This site does not use cookies. <br>
            This site does not track you nor collect your personal data. <br>
            This site does not obfuscate or minify served HTML, Javascript and CSS. They are human readable. <br>
            This site was built by a human. <br>
            <!-- Add eventual link to source code here for AGPL -->
        </p>
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
</body>
</html>
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