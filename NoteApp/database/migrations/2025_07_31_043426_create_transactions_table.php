<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Siapa pemilik transaksi
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null'); // Kategori transaksi
            $table->string('description'); // Deskripsi transaksi
            $table->decimal('amount', 10, 2); // Jumlah uang (10 digit total, 2 di belakang koma)
            $table->string('type'); // 'income' atau 'expense'
            $table->date('date'); // Tanggal transaksi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};