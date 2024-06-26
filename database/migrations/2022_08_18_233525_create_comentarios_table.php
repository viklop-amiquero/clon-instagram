<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    // public function up()
    // {
    //     Schema::create('comentarios', function (Blueprint $table) {
    //         $table->id();
    //         $table->foreignId('user_id')->constrained();
    //         $table->foreignId('post_id')->constrained();
    //         $table->string('comentario');
    //         $table->timestamps();
    //     });
    // }

    // Si un usuario Elimina su post, tambien elimina sus comentarios
    // Si un usuario Elimina su cuenta, también elimina sus comentarios

    public function up()
    {
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->string('comentario');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comentarios');
    }
};
