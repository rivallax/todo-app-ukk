<?php


// php artisan session:table
// php artisan migrate: fresh


namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\TaskList;
use Illuminate\Http\Request;
// namespace App\Http\Controllers: Menempatkan controller di namespace yang sesuai dengan konvensi Laravel.
// use App\Models\Task: Mengimpor model Task untuk mengakses data task dari database.
// use App\Models\TaskList: Mengimpor model TaskList untuk mengakses data list task.
// use Illuminate\Http\Request: Mengimpor kelas Request untuk menangani input dari form atau URL.


class TaskController extends Controller
{
    /**
     * Menampilkan halaman utama dengan daftar TaskList dan Task yang ada.
     * Tasks diurutkan berdasarkan waktu pembuatan (created_at DESC).
     */
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




    //
     // Menyimpan task baru ke dalam database setelah validasi input.
    //Memvalidasi data yang diterima:
    // name wajib dan maksimal 100 karakter.
    // deskripsi opsional, maksimal 255 karakter.
    // priority wajib, harus salah satu dari low, medium, atau high.
    // list_id wajib, harus sesuai dengan ID yang ada di tabel task_lists.
    // Jika validasi berhasil, data task baru dibuat dengan metode Task::create().
    // Redirect ke halaman sebelumnya dengan pesan sukses (Task successfully added!).
    //
    public function store(Request $request)
    {
        // Validasi input untuk memastikan data yang masuk sesuai
        $request->validate([
            'name' => 'required|max:100', // Nama task wajib diisi dan maksimal 100 karakter
            'description' => 'nullable|string', // Deskripsi boleh kosong
            'priority' => 'required|in:low,medium,high', // Prioritas harus sesuai pilihan
            'list_id' => 'required|exists:task_lists,id' // list_id harus ada dalam tabel task_lists
        ]);

        // Menyimpan task baru
        Task::create([
            'name' => $request->name,
            'description' => $request->description,
            'priority' => $request->priority,
            'list_id' => $request->list_id
        ]);

        return redirect()->back()->with('success', 'Task berhasil ditambahkan!');
    }
    //     Memvalidasi data yang diterima:
    // name wajib dan maksimal 100 karakter.
    // deskripsi opsional, maksimal 255 karakter.
    // priority wajib, harus salah satu dari low, medium, atau high.
    // list_id wajib, harus sesuai dengan ID yang ada di tabel task_lists.
    // Jika validasi berhasil, data task baru dibuat dengan metode Task::create().
    // Redirect ke halaman sebelumnya dengan pesan sukses (Task successfully added!).



    /**
     * Mengubah status task menjadi selesai atau belum selesai (toggle status is_completed).
     * @param  int  $id // mengambil parameter id
    //     Mengambil task berdasarkan id menggunakan findOrFail(), yang akan menghasilkan 404 jika tidak ditemukan.
    // Mengupdate field is_completed menjadi true untuk menandai task selesai.
    // Redirect ke halaman sebelumnya dengan pesan sukses (Task marked as completed.).
     */
    // Menandai task sebagai selesai
    public function complete($id)
    {
        $task = Task::findOrFail($id);
        $task->update([
            'is_completed' => true
        ]);

        return redirect()->back()->with('success', 'Task berhasil di update.');
    }


    /**
     * Menghapus task berdasarkan ID.
     * @param  int  $id
     */
    public function destroy($id)
    {
        Task::findOrFail($id)->delete(); // Mencari task dan menghapusnya

        return redirect()->back()->with('success', 'Task berhasil dihapus!');
    }

    /**
     * Menampilkan detail task berdasarkan ID.
     * @param  int  $id
     */
    public function show($id)
    {
        $data = [
            'title' => 'Detail',
            'lists' => TaskList::all(),
            'task' => Task::findOrFail($id),
        ];

        return view('pages.details', $data);
    }
    // Menampilkan semua tugas yang ada
    public function allTasks(Request $request)
    {
        // Mendapatkan query pencarian
        $query = $request->input('query');

        // Kondisi pencarian
        if ($query) {
            // Pada saat query pencarian ada
            // Mendapatkan data task berdasarkan query
            $tasks = Task::where('name', 'like', "%{$query}%")
                ->orWhere('description', 'like', "%{$query}%")
                ->latest()
                ->get();

            // Mendapatkan data list berdasarkan query
            $lists = TaskList::where('name', 'like', "%{$query}%")
                ->orWhereHas('tasks', function ($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%")
                        ->orWhere('description', 'like', "%{$query}%");
                })
                ->with('tasks')
                ->get();

            // Jika query pencarian kosong atau tidak ada data yang ditemukan
            // Mengambil semua data task
            if ($tasks->isEmpty()) {
                $lists->load('tasks');
            } else {
                // Pada saat query pencarian ada dan ada data yang ditemukan
                // Ambil data task berdasarkan query
                $lists->load(['tasks' => function ($q) use ($query) {
                    $q->where('name', 'like', "%{$query}%")
                        ->orWhere('description', 'like', "%{$query}%");
                }]);
            }
        } else {
            // Pada saat query pencarian tidak ada atau tidak ada data yang ditemukan ambil semua data
            $tasks = Task::latest()->get();
            $lists = TaskList::with('tasks')->get();
        }

        // Mengirimkan data ke view
        $data = [
            'title' => 'all-task', // Judul halaman
            'lists' => $lists, // Data list
            'tasks' => $tasks, // Data task
            'priorities' => Task::PRIORITIES // Prioritas dari model Task
        ];

        // Tampilkan view beserta data
        return view('pages.all-task', $data);
    }
    // public function allTasks()
    // {
    //     $data = [
    //         'title' => 'All Tasks', // Judul halaman
    //         'lists' => TaskList::all(), // Mengambil semua daftar tugas
    //         'tasks' => Task::orderBy('created_at', 'desc')->get() // Mengambil semua tugas dengan urutan terbaru
    //     ];

    //     return view('pages/all-task', $data); // Mengembalikan tampilan dengan data
    // }

    // Menampilkan tugas dengan prioritas rendah
    public function low()
    {
        $data = [
            'title' => 'Low Priority Tasks', // Judul halaman
            'lists' => TaskList::with(['tasks' => function ($query) {
                $query->where('priority', 'low')->orderBy('created_at', 'desc');
            }])->get() // Mengambil daftar tugas dengan filter prioritas rendah
        ];

        return view('pages.low', $data); // Mengembalikan tampilan dengan data
    }

    // Menampilkan tugas dengan prioritas sedang
    public function medium()
    {
        $data = [
            'title' => 'Medium Priority Tasks', // Judul halaman
            'lists' => TaskList::all(), // Mengambil semua daftar tugas
            'tasks' => Task::where('priority', 'medium')->orderBy('created_at', 'desc')->get() // Mengambil tugas prioritas sedang
        ];

        return view('pages/medium', $data); // Mengembalikan tampilan dengan data
    }

    // Menampilkan tugas dengan prioritas tinggi
    public function high()
    {
        $data = [
            'title' => 'High Priority Tasks', // Judul halaman (sebelumnya tertulis "Medium Priority Tasks", diperbaiki ke "High Priority Tasks")
            'lists' => TaskList::all(), // Mengambil semua daftar tugas
            'tasks' => Task::where('priority', 'high')->orderBy('created_at', 'desc')->get() // Mengambil tugas prioritas tinggi
        ];

        return view('pages/high', $data); // Mengembalikan tampilan dengan data
    }

    // Mengubah daftar tugas (list) dari suatu task
    public function changeList(Request $request, Task $task)
    {
        $request->validate([
            'list_id' => 'required|exists:task_lists,id', // Validasi list_id harus ada di tabel task_lists
        ]);

        Task::findOrFail($task->id)->update([
            'list_id' => $request->list_id // Mengupdate list_id pada task yang dipilih
        ]);

        return redirect()->back()->with('success', 'List berhasil diperbarui!'); // Redirect kembali dengan pesan sukses
    }

    // Memperbarui data tugas (task)
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'list_id' => 'required', // Validasi bahwa list_id harus diisi
            'name' => 'required|max:100', // Validasi nama tidak boleh kosong dan maksimal 100 karakter
            'description' => 'max:255', // Validasi deskripsi maksimal 255 karakter
            'priority' => 'required|in:low,medium,high' // Validasi prioritas hanya boleh low, medium, atau high
        ]);

        Task::findOrFail($task->id)->update([
            'list_id' => $request->list_id,
            'name' => $request->name,
            'description' => $request->description,
            'priority' => $request->priority // Mengupdate prioritas task
        ]);

        return redirect()->back()->with('success', 'Task berhasil diperbarui!'); // Redirect kembali dengan pesan sukses
    }

    // Menampilkan halaman profil
    public function profile()
    {
        return view('pages.profile', ['title' => 'Profile']); // Mengembalikan tampilan halaman profil dengan title "Profile"
    }
}
// Mengambil task berdasarkan id, atau menampilkan error 404 jika tidak ditemukan.
// Mengirimkan data task ke view pages.details dengan judul halaman Details.
