<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 150);
            $table->string('email', 150)->unique();
            $table->string('cpf', 14)->unique()->nullable();
            $table->string('telefone', 20)->nullable();
            $table->boolean('ativo')->default(true);
            $table->date('data_nascimento')->nullable();
            $table->timestamp('create_at')->useCurrent();
            $table->timestamp('update_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};