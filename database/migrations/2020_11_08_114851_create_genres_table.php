<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGenresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string("genre_name");
        });

        Schema::create('genre_release', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("genre_id");
            $table->unsignedBigInteger("release_id");

            $table->unique("genre_id", "release_id");

            $table->foreign("genre_id")->references("id")->on("genres")->onDelete("cascade");
            $table->foreign("release_id")->references("id")->on("releases")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('genres');
    }
}
