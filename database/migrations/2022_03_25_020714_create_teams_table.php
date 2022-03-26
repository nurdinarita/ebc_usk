<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->ForeignId('user_id');
            $table->string('school');
            $table->string('category');
            $table->string('team_name');
            $table->string('logo');
            $table->string('address');
            $table->string('city');
            $table->string('document');
            $table->string('coach_name');
            $table->string('coach_nik');
            $table->string('coach_lisense');
            $table->string('coach_photo');
            $table->string('assistant_coach');
            $table->string('assistant_coach_nik');
            $table->string('assistant_coach_lisense');
            $table->string('assistant_coach_photo');
            $table->string('manager_name');
            $table->string('manager_nik');
            $table->string('manager_photo');

            for($i = 1; $i <= 10; $i++){
                $table->string('p_name_'.$i)->nullable();
                $table->string('p_nik_'.$i)->nullable();
                $table->string('p_photo_'.$i)->nullable();
            }
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
        Schema::dropIfExists('teams');
    }
}
