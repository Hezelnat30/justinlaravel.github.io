<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('hobi_siswa', function (Blueprint $table) {
            // Create table hobi_siswa
            $table->integer('id_siswa')->unsigned()->index();
            $table->integer('id_hobi')->unsigned()->index();
            $table->timestamps();

            // Set Primary Key
            $table->primary(['id_siswa', 'id_hobi']);

            // Set Foreign Key hobi_siswa --- siswa
            $table->foreign('id_siswa')
                ->references('id')
                ->on('siswa')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            // Set Foreign Key hobi_siswa --- hobi
            $table->foreign('id_hobi')
                ->references('id')
                ->on('hobi')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('hobi_siswa');
    }
};
