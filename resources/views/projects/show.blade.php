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
    <title>{{ $project->title ?? 'Error' }}</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <div id="content">
        @include("sidebar")
        <div id="content-text">
            @if ( $project )
                <h1>{{ $project->title ?? 'No project was selected'}}</h1><br>
                @if ( $project->description ) <p>{!! nl2br(e($project->description)) !!}</p><br>@endif
                @if ( $project->projectURL ) The project is available <a href="{{ $project->projectURL }}">here</a>. @endif
            @else
                <h1>No project was selected</h1>
            @endif
        </div>
    </div>
@vite('resources/js/disclaimerRedirect.js')
</body>
</html>