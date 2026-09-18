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
    <title>Admin Login</title>
    @vite(['resources/css/app.css'])
    <style>

        #login-store-form {
            padding: 0.4vw;
        }

    </style>
</head>
<body>

    <h1 class="abs-top-centered">Admin Login</h1>

    @error('error')
        <div class="abs-top-25-centered">{{ $message }}</div>
    @enderror

    <form method="POST" action="{{ route('login.store') }}" id="login-store-form" class="abs-centered-modal">
        @csrf
        <div class="flex-column">
            <label for="username" class="styled-label">Username</label>
            <input id="username" class="styled-input" name="username" type="text" required>
        </div>

        <div class="flex-column">
            <label for="password" class="styled-label">Password</label>
            <input id="password" class="styled-input" name="password" type="password" required>
        </div>

        <button type="submit" class="styled-button">Login</button>
    </form>

</body>
</html>