<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //index() → Mengambil semua daftar tugas dan tugas yang ada untuk ditampilkan di halaman utama.
    public function index()
    {
        $data = [
            'title' => 'Home',
            'lists' => TaskList::all(),
            'tasks' => Task::orderBy('created_at', 'desc')->get(),
            'priorities' => Task::PRIORITIES
        ];

        return view('pages.home', $data);
    }

    //store() → Menyimpan tugas baru ke database.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'list_id' => 'required'
        ]);

        Task::create([
            'name' => $request->name,
            'list_id' => $request->list_id
        ]);


        return redirect()->back();
    }

    //complete() → Menandai tugas sebagai selesai (is_completed = true).
    public function complete($id)
    {
        Task::findOrFail($id)->update([
            'is_completed' => true
        ]);

        return redirect()->back();
    }

    //destroy() → Menghapus tugas berdasarkan ID.
    public function destroy($id)
    {
        Task::findOrFail($id)->delete();

        return redirect()->back();
    }
}
