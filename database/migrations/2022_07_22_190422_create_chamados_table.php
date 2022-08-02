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
    public function up()
    {
        Schema::create('chamados', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('descricao');
            $table->string('parecer_tecnico')->nullable();
            $table->string('status')->default('Aberto');
            $table->string('categoria');
            $table->foreignId('user_id')
            ->constrained('users')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreignId('tecnico_id')
            ->constrained('tecnicos')
            ->onDelete('cascade')
            ->onUpdate('cascade')
            ->nullable();
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
        Schema::dropIfExists('chamados');
    }
};