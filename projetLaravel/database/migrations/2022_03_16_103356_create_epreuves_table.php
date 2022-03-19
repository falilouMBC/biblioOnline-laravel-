<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpreuvesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('epreuves', function (Blueprint $table) {
            $table->id();
            $table->text('intitulet');
            $table->text('matiere');
            $table->text('filiere');
            $table->text('professeur');
            $table->text('file');
            $table->unsignedBigInteger('id_user');
            $table->foreign("id_user")
                ->references("id")
                ->on("users")
                ->onDelete("cascade");
            $table->softDeletes();
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
        Schema::drop('epreuves');
    }
}
