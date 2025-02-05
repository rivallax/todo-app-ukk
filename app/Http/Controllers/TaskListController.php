<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskListController extends Controller
{
    //store() → Menyimpan daftar tugas baru.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100'
        ]);

        TaskList::create([
            'name' => $request->name
        ]);

        return redirect()->back();
    }

    //destroy() → Menghapus daftar tugas berdasarkan ID.
    public function destroy($id)
    {
        TaskList::findOrFail($id)->delete();

        return redirect()->back();
    }
}
