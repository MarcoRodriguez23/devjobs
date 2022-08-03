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
        Schema::table('vacantes', function (Blueprint $table) {
            $table->string('title');
            $table->foreignId('salario_id')->constrained()->onDelete('cascade');
            $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
            $table->string('company');
            $table->date('lastday');
            $table->text('description');
            $table->string('image');
            $table->integer('posted')->default(1);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('vacantes', function (Blueprint $table) {
            $table->dropForeign('vacantes_categoria_id_foreign');
            $table->dropForeign('vacantes_salario_id_foreign');
            $table->dropForeign('vacantes_user_id_foreign');
            $table->dropColumn('title');
            $table->dropColumn('salario_id');
            $table->dropColumn('categoria_id');
            $table->dropColumn('company');
            $table->dropColumn('lastday');
            $table->dropColumn('description');
            $table->dropColumn('image');
            $table->dropColumn('posted');
            $table->dropColumn('user_id');
            //otra forma de escribir cuando son muchas columnas
            // $table->dropColumn(['col1','col2','col3','etc']);
        });
    }
};
