<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Model TaskList mewakili daftar tugas dalam aplikasi.
 * Model ini digunakan untuk mengelola data daftar tugas (task list) 
 * yang terdiri dari nama daftar dan relasi dengan tugas-tugas (tasks) terkait.
 */
class TaskList extends Model
{
    /**
     * Menentukan atribut yang dapat diisi secara massal (mass assignment).
     * 'name' adalah satu-satunya atribut yang dapat diisi.
     */
    protected $fillable = ['name'];

    /**
     * Menentukan atribut yang tidak boleh diisi secara massal.
     * 'id', 'created_at', dan 'updated_at' tidak boleh diubah oleh mass assignment.
     */
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    /**
     * Mendefinisikan relasi satu ke banyak (one-to-many) dengan model Task.
     * Setiap TaskList dapat memiliki banyak Task.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class, 'list_id');
    }
}
