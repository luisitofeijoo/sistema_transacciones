<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->id();
            $table->integer('codigo')->default(1000)->unique();
            $table->string('tipo_persona')->nullable();
            $table->string('nombre_razonsocial')->nullable();
            $table->string('nro_documento')->nullable();
            $table->string('asunto')->nullable();
            $table->string('direccion')->nullable();
            $table->string('celular')->nullable();
            $table->string('email')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('archivo')->nullable();
            $table->string('url_drive')->nullable();
            $table->integer('folio')->nullable();
            $table->integer('estado')->default(0);

            $table->bigInteger('tipo_documento_id')->unsigned();
            $table->foreign('tipo_documento_id')->references('id')->on('tipo_documentos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expedientes');
    }
};
