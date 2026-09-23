<?php

/**
 * This Source Code does not contain AI generated code.
 * If downstream edits involve AI generated code, please update or remove this header.
 * 
 * Copyright © 2026 boniondev
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as
 * published by the Free Software Foundation, either version 3 of the
 * License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 * See the GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */

namespace App\Http\Controllers;

use App\Models\QA;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class QAController extends Controller
{

    public function index()
    {
        $QA = DB::table('QA')
            ->where('hidden', '0')
            ->orderBy('updatedAt')
            ->get();
        return view('QA.index', ['QA' => $QA]);
    }

    public function adminIndex()
    {
        $QA = QA::latest()->get();
        return view('admin.QA.index', ['QA' => $QA]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => ['required', 'string'],
        ]);
        QA::create([
            'question' => $validated['question'],
            'answer' => null,
            'hidden' => 1,
        ]);
        return redirect()->route('qa.index');
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'answer' => ['required', 'string'],
            'hidden' => ['required', 'boolean'],
        ]);
        $success = QA::findOrFail($id)->update($validated);
        if ($success) {
            return redirect()->route('admin.qa.index')->with('success', 'QA updated successfully');
        } else {
            return redirect()->route('admin.qa.index')->with('error', 'QA update failed');
        }
    }

    public function destroy(string $id)
    {
        QA::destroy($id);
        return redirect()->route('admin.qa.index')->with('success', 'QA deleted successfully');
    }

}
