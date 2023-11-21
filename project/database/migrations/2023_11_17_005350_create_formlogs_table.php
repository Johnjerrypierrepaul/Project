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
        Schema::create('formlogs', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->string('Lastname', 255);
            $table->string('telefone', 14);
            $table->string('email', 255);
            $table->string('sexo', 255);
            $table->string('estado_civil', 255);
            $table->date('Data_nascimento')->nullable();
            $table->string('nacionalidade');
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
        Schema::dropIfExists('formlogs');
    }
};
