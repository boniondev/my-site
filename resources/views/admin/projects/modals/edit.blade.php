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
<style>

    .modal-button-group-div {
        margin-top: 0.2vw;
        margin-bottom: 0.2vw;
    }

</style>
<div id="edit-project-modal" class="abs-centered-modal" hidden>
    Edit Project
    <form id="edit-project-modal-form" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-label-input-group-div">
            <label for="edit-project-modal-title">Title</label>
            <input type="text" name="title" id="edit-project-modal-title" class="styled-input" required>
        </div>
        <div class="modal-label-input-group-div">
            <label for="edit-project-modal-description">Description</label>
            <textarea name="description" id="edit-project-modal-description" class="styled-input"></textarea>
        </div>
        <div class="modal-label-input-group-div">
            <label for="edit-project-modal-url">Project URL</label>
            <input type="url" name="projectURL" id="edit-project-modal-url" class="styled-input">
        </div>
        <div class="modal-button-group-div">
            <button type="submit" class="styled-button">Edit Project</button>
            <button type="button" id="edit-project-modal-close" class="styled-button">Close</button>
        </div>
    </form>
</div>