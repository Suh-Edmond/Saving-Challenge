<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSavingTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('saving_types', function (Blueprint $table) {
            $table->id();
            $table->string("number_of_weeks")->default(1);
            $table->string('amount_payable');
            $table->string("total_amount");
            $table->unsignedBigInteger("challenge_type_id");
            $table->foreign('challenge_type_id')
                ->references('id')
                ->on('challenge_types')
                ->onDelete('cascade')
                ->onUpdate('cascade');
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
        Schema::dropIfExists('saving_types');
    }
}
