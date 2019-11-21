<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitationnotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitationnotes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('category',['Mangel','Restarbeit','Information','zu erledigen']);
            $table->string('title');
            $table->string('notes')->nullable();
            $table->date('deadline')->nullable();
            $table->boolean('done')->default(0);
            $table->boolean('important')->default(0);
            $table->integer('visit_id');
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
        Schema::dropIfExists('visitationnotes');
    }
}
