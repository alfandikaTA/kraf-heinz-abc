<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DetailTransaksiFk extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasColumn('id_barang', 'id_header_transaksi')) {
            Schema::table('detail_transaksi', function (Blueprint $table) {
                $table->dropColumn('id_barang');
                $table->dropColumn('id_header_transaksi');
            });
        }

        Schema::table('detail_transaksi', function (Blueprint $table) {
            $table->foreignId("id_barang")->references("id_barang")->on("barang")->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId('id_header_transaksi')->references("id_header_transaksi")->on("header_transaksi")->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_transaksi', function (Blueprint $table) {
        });
    }
}