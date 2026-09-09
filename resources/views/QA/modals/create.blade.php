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
<div id="create-qa-modal" hidden>
    <form action="{{ route('qa.store') }}" method="post">
        @csrf
        <div>
            <label for="create-qa-modal-question">Question</label>
            <textarea name="question" id="create-qa-modal-question" required></textarea>
        </div>
        <button type="submit">Submit Question</button>
        <button type="button" id="create-qa-modal-close">Close</button>
    </form>
</div>