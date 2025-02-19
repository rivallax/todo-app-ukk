<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menjalankan migrasi untuk membuat tabel 'tasks'.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id(); // Kolom ID sebagai primary key
            $table->string('name'); // Nama tugas (wajib diisi)
            $table->string('description')->nullable(); // Deskripsi tugas (opsional)
            $table->boolean('is_completed')->default(false); // Status tugas, default tidak selesai
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium'); // Prioritas tugas dengan nilai default 'medium'
            $table->timestamps(); // Kolom created_at dan updated_at

            // Relasi ke tabel 'task_lists' dengan foreign key list_id
            $table->foreignId('list_id')->constrained('task_lists', 'id')->onDelete('cascade');
            // Jika task list dihapus, semua tugas yang terkait juga akan terhapus (cascade)
        });
    }

    /**
     * Membatalkan migrasi dengan menghapus tabel 'tasks'.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks'); // Menghapus tabel jika rollback dilakukan
    }
};
