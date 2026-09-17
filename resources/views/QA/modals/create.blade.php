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

    #create-qa-modal-form {
        display: flex;
        flex-direction: column;
        gap: 0.2vw;
        margin: 0.3vw;
    }

    #create-qa-modal-question-div {
        display: flex;
        flex-direction: column;
    }

    #create-qa-modal-question-textarea {
        font-family: '0xProto';
        font-size: 0.85em;
        color: white;
        background-color: black;
        border: none;
        resize: none;
        outline: 0.1vw solid gray;
        min-height: 5vh;
        min-width: 15vw;
    }
    
    #create-qa-modal-button-group-div {
        display: flex;
        justify-content: space-between;
    }

</style>
<div id="create-qa-modal" class="abs-centered-modal" hidden>
    <form action="{{ route('qa.store') }}" method="post" id="create-qa-modal-form">
        @csrf
        <div id="create-qa-modal-question-div">
            <textarea name="question" id="create-qa-modal-question-textarea" placeholder="Write your question here..." required></textarea>
        </div>
        <div id="create-qa-modal-button-group-div">
            <button type="submit" class="styled-button">Submit Question</button>
            <button type="button" class="styled-button" id="create-qa-modal-close">Close</button>
        </div>
    </form>
</div>