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
        Schema::table("tbl_venda", function (Blueprint $table) {
            $table->unsignedBigInteger("fk_tbl_carrinho_tbl_venda");
            $table->foreign("fk_tbl_carrinho_tbl_venda")->references("id_tbl_carrinho")->on("tbl_carrinho");
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
