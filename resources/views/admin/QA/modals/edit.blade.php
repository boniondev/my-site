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
<div id="edit-qa-modal" hidden>
    Edit QA
    <form id="edit-qa-modal-form" method="post">
        @csrf
        @method('PUT')
        <div>
            <div>Question</div>
            <div id="edit-qa-modal-question"></div>
        </div>
        <div>
            <label for="edit-qa-modal-answer">Answer</label>
            <textarea name="answer" id="edit-qa-modal-answer"></textarea>
        </div>
        <div>
            <label for="edit-qa-modal-hidden">Hidden?</label>
            <input type="checkbox" name="hidden" id="edit-qa-modal-hidden">
        </div>
        <button type="submit">Save QA</button>
        <button type="button" id="edit-qa-modal-cancel">Cancel</button>
    </form>
</div>