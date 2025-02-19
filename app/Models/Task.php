<?php

namespace App\Models; // Menyatakan namespace untuk model ini

use Illuminate\Database\Eloquent\Model; // Mengimpor Model Eloquent dari Laravel untuk interaksi dengan database
use App\Models\TaskList; // Mengimpor model TaskList untuk relasi dengan tabel task_lists

class Task extends Model
{
    // Menentukan atribut yang dapat diisi (mass assignable)
    protected $fillable = [
        'name', // Nama tugas
        'description', // Deskripsi tugas
        'is_completed', // Status tugas (selesai atau tidak)
        'priority', // Prioritas tugas
        'list_id' // ID dari list tugas
    ];

    // Menentukan atribut yang tidak dapat diisi (guarded)
    protected $guarded = [
        'id', // ID tidak dapat diisi
        'created_at', // Tanggal pembuatan tidak dapat diisi
        'updated_at' // Tanggal pembaruan tidak dapat diisi
    ];

    // Mendefinisikan konstanta prioritas tugas
    const PRIORITIES = [
        'low', // Prioritas rendah
        'medium', // Prioritas sedang
        'high' // Prioritas tinggi
    ];

    // Aksesori (accessor) untuk mendapatkan kelas CSS berdasarkan prioritas
    public function getPriorityClassAttribute()
    {
        // Menggunakan match expression untuk menentukan kelas CSS berdasarkan prioritas tugas
        return match ($this->attributes['priority']) {
            'low' => 'success', // Kelas 'success' untuk prioritas rendah
            'medium' => 'warning', // Kelas 'warning' untuk prioritas sedang
            'high' => 'danger', // Kelas 'danger' untuk prioritas tinggi
            default => 'secondary' // Kelas 'secondary' untuk prioritas yang tidak terdefinisi
        };
    }

    // Relasi antara Task dan TaskList (setiap task memiliki list_id yang merujuk ke TaskList)
    public function list()
    {
        return $this->belongsTo(TaskList::class, 'list_id'); // Relasi belongsTo dengan model TaskList
    }
}
