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
<html>
<head>
    <title>Admin Dashboard</title>
</head>
<body>
<h1>Admin Dashboard</h1>
<p>Welcome, {{ auth()->user()->username }}</p>
<form method="POST" action="/logout">
    @csrf
    <button type="submit">Logout</button>
</form>
</body>
</html>