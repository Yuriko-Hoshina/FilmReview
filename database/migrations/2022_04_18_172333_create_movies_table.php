<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();
        Schema::create('movies', function (Blueprint $table) {
            $table->bigInteger('id')->primary();
            /*
            $table->string('title');
            $table->string('director');
            $table->bigInteger('country_id');
            $table->bigInteger('genre_id');
            $table->string('movietime');
            $table->string('release');
            */
            $table->string('homepage')->nullable;
            
            $table->Integer('runtime')->nullable;
            
            $table->String('poster_path')->nullable;
            $table->Boolean('adult');
            $table->Text('overview');
            $table->String('release_date');
            $table->String('original_title');
            $table->String('original_language');
            $table->String('title');
            $table->String('backdrop_path')->nullable;
            $table->Integer('popularity');
            $table->Integer('vote_count');
            $table->Boolean('video');
            $table->Integer('vote_average');
            
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
        Schema::dropIfExists('movies');
    }
}
