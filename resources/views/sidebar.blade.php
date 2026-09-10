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
<nav class="sidebar">
    @if (auth()->user() instanceof \App\Models\Admin)
        <a href="{{ route('admin.dashboard') }}" class="sidebar-hyperlink">Dashboard</a>
        <a href="{{ route('admin.projects.index') }}" class="sidebar-hyperlink">Projects</a>
        <a href="{{ route('admin.qa.index') }}" class="sidebar-hyperlink">QA</a>
        <a href="{{ route('login.destroy') }}" class="sidebar-hyperlink">Logout</a>
    @else
        <a href="{{ route('landing') }}" class="sidebar-hyperlink">Landing</a>
        <a href="{{ route('projects.index') }}" class="sidebar-hyperlink">Projects</a>
        <a href="{{ route('qa.index') }}" class="sidebar-hyperlink">QA</a>
        <a href="{{ route('about') }}" class="sidebar-hyperlink">About</a>
    @endif
</nav>