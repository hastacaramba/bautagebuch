<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectnotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectnotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('category',['Mangel','Restarbeit','Information','zu erledigen']);
            $table->string('title');
            $table->string('notes')->nullable();
            $table->date('deadline')->nullable();
            $table->boolean('done')->default(0);
            $table->integer('project_id');
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
        Schema::dropIfExists('projectnotes');
    }
}
