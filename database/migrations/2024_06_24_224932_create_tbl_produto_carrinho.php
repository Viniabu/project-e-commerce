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
        Schema::create('tbl_produto_carrinho', function (Blueprint $table) {
            $table->unsignedBigInteger('id_tlb_carrinho');
            $table->unsignedBigInteger('id_tbl_produto');

            
            $table->foreign('id_tbl_carrinho')->references('id_tbl_carrinho')->on('tbl_carrinho');           
            $table->foreign('id_tbl_produto')->references('id_tbl_produto')->on('tbl_produto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_produto_carrinho');
    }
};
