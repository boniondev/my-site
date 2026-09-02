<!--
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
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projects</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <div id="content">
        @include("sidebar")
        <div id="content-text">
            @if ( sizeof($projects) > 0 )
            <div id="project-container">
                @foreach ( $projects as $project )
                    <a href="{{ route('projects.show', $project->id) }}" class="project-link">{{ $project->title }}</a>
                @endforeach
            </div>
            @endif
        </div>
    </div>
</body>
</html>