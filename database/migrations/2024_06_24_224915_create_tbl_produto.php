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
        Schema::create('tbl_produto', function (Blueprint $table) {
            $table->id('id_tbl_produto');
            $table->string('nome_produto', 100);
            $table->string('descricao_produto', 255);
            $table->decimal('preco_produto', 10, 2);
            $table->integer('estoque');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_produto');
    }
};
