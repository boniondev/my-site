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
    <title>QA</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    <div id="content">
        @include('sidebar')
        <div id="content-text">
            <button type="button" id='create-qa-button'>Submit Question</button>
            @if ( $QA )
                @foreach ( $QA as $QAEntry )
                    <div class="qa-entry">
                        {{ $QAEntry->question }}<br>
                        {{ $QAEntry->answer }}<br>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@include('QA.modals.create')
</body>
</html>
<script>

    const createQaButton = document.getElementById('create-qa-button')
    const createQaModal = document.getElementById('create-qa-modal')
    const createQaModalQuestion = document.getElementById('create-qa-modal-question')
    const createQaModalClose = document.getElementById('create-qa-modal-close')
    createQaButton.addEventListener('click', function () {
        createQaModal.hidden = false
    })
    createQaModalClose.addEventListener('click', function() {
        createQaModalQuestion.value = ''
        createQaModal.hidden = true
    })

</script>