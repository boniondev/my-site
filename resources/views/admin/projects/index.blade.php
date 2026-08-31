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
</head>
<body>
    <button type="button" id="add-project-button">Add Project</button>
    @if ( sizeof($projects) > 0 )
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Description</th>
            <th>URL</th>
            <th>Actions</th>
        </tr>
    @foreach ( $projects as $project )
    <tr>
        <td>{{ $project->id }}</td>
        <td>{{ $project->title }}</td>
        <td>{{ $project->description }}</td>
        <td>{{ $project->projectURL }}</td>
        <td><button
                type="button"
                class="edit-project-button"
                data-project-id="{{ $project->id }}"
                data-project-title="{{ $project->title }}"
                data-project-description="{{ $project->description }}"
                data-project-url="{{ $project->projectURL }}"
            >Edit</button>
            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
    </table>
    @endif
@include('admin.projects.modals.create')
@include('admin.projects.modals.edit')
</body>
</html>
<script>

    const addProjectButton = document.getElementById('add-project-button')
    const addProjectModal = document.getElementById('add-project-modal')
    const addProjectModalCloseButton = document.getElementById('add-project-modal-close')
    const addProjectModalTitleField = document.getElementById('add-project-modal-title')
    const addProjectModalDescriptionField = document.getElementById('add-project-modal-description')
    const addProjectModalURLField = document.getElementById('add-project-modal-url')
    addProjectButton.addEventListener('click', function () {
        addProjectModal.hidden = false
    })
    addProjectModalCloseButton.addEventListener('click', function () {
        addProjectModal.hidden = true
        addProjectModalTitleField.value = ''
        addProjectModalDescriptionField.value = ''
        addProjectModalURLField.value = ''
    })

    const editProjectModal = document.getElementById('edit-project-modal')
    const editProjectModalForm = document.getElementById('edit-project-modal-form')
    const editProjectModalTitle = document.getElementById('edit-project-modal-title')
    const editProjectModalDescription = document.getElementById('edit-project-modal-description')
    const editProjectModalUrl = document.getElementById('edit-project-modal-url')
    const editProjectButtons = document.querySelectorAll('.edit-project-button')
    const editProjectModalCloseButton = document.getElementById('edit-project-modal-close')
    editProjectModalCloseButton.addEventListener('click', function () {
        editProjectModal.hidden = true
        editProjectModalTitle.value = ''
        editProjectModalDescription.value = ''
        editProjectModalUrl.value = ''
    })
    editProjectButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            editProjectModal.hidden = false
            editProjectModalForm.action = `/admin/projects/${button.dataset.projectId}`
            editProjectModalTitle.value = button.dataset.projectTitle
            editProjectModalDescription.value = button.dataset.projectDescription
            editProjectModalUrl.value = button.dataset.projectUrl
        })
    })

</script>