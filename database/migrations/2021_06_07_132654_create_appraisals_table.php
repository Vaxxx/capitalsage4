<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppraisalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appraisals', function (Blueprint $table) {
            $table->id();
            $table->string('recipient');
            $table->string('donor');
            $table->text('subject');
            $table->text('reply')->nullable();
            $table->string('date_requested');
            $table->string('deadline_date');
            $table->string('response_time')->nullable();
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
        Schema::dropIfExists('appraisals');
    }
}
