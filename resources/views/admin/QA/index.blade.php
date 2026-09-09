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
    <title>Admin | QA</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <div id="content">
        @include('sidebar')
        <div id="content-text">
            @if ( $QA )
                @foreach ( $QA as $QAEntry )
                    <div class="QAEntry">
                        {{ $QAEntry->id }}<br>
                        {{ $QAEntry->question }}<br>
                        @if($QAEntry->answer) {{ $QAEntry->answer }}<br> @endif
                        hidden:<input type=checkbox {{ $QAEntry->hidden ? 'checked' : '' }}><br>
                        <button 
                            type="button"
                            class="edit-qaentry-button"
                            data-qaentry-id="{{ $QAEntry->id }}"
                            data-qaentry-question="{{ $QAEntry->question }}"
                            data-qaentry-answer="{{ $QAEntry->answer }}"
                            data-qaentry-hidden="{{ $QAEntry->hidden }}"
                        >Edit</button>
                        <form action="{{ route('admin.qa.destroy', $QAEntry->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                @endforeach
            @else
                <p>No QA found</p>
            @endif
        </div>
    </div>
<!-- Normally there'd be a create modal here, but the admin here does *not* make up questions for themselves -->
@include('admin.QA.modals.edit')
</body>
</html>
<script>

    const editQaModal = document.getElementById('edit-qa-modal')
    const editQaModalForm = document.getElementById('edit-qa-modal-form')
    const editQaModalQuestion = document.getElementById('edit-qa-modal-question')
    const editQaModalAnswer = document.getElementById('edit-qa-modal-answer')
    const editQaModalHidden = document.getElementById('edit-qa-modal-hidden')
    const editQaModalCancelButton = document.getElementById('edit-qa-modal-cancel')
    const editQaButtons = document.querySelectorAll('.edit-qaentry-button')
    editQaModalCancelButton.addEventListener('click', function() {
        editQaModal.hidden = true
        editQaModalQuestion.value = ''
        editQaModalAnswer.value = ''
        editQaModalHidden.checked = false
    })
    editQaButtons.forEach(function (button) {
        button.addEventListener('click', function () {
            editQaModal = false
            editQaModalForm.action = `{{ route('admin.qa.update', '__QA_ID__') }}`.replace('__QA_ID__', button.dataset.qaentryId)
            editQaModalQuestion.value = button.dataset.qaentryQuestion
            editQaModalAnswer.value = button.dataset.qaentryAnswer
            editQaModalHidden = button.dataset.qaentryHidden === '1' ? 'hidden' : ''
        })
    })

</script>