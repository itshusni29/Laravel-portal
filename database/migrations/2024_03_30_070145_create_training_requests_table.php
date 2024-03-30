<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('training_requests', function (Blueprint $table) {
            $table->id();
            $table->string('judul_training');
            $table->date('tanggal_training');
            $table->string('trainer');
            $table->integer('jumlah_peserta');
            $table->string('tempat');
            $table->string('nama_manager')->nullable();
            $table->string('nama_general_manager')->nullable();
            $table->string('status')->default('Menunggu Persetujuan');
            $table->boolean('manager_approve')->default(false);
            $table->boolean('general_manager_approve')->default(false);
            $table->boolean('hrd_approve')->default(false);
            $table->text('comment_manager')->nullable();
            $table->text('comment_general_manager')->nullable();
            $table->text('comment_hrd')->nullable();
            $table->string('penawaran_pdf')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('training_requests');
    }
}
