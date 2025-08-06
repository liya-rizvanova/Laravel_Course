<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataRelationshipsTable extends Migration
{
    public function up()
    {
        Schema::create('data_relationships', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('data_type_id');
            $table->string('field');
            $table->string('relationship_type');
            $table->string('relationship_model');
            $table->string('relationship_table');
            $table->string('relationship_column');
            $table->string('relationship_key');
            $table->string('pivot_table')->nullable();
            $table->string('pivot_column')->nullable();
            $table->string('pivot_related_column')->nullable();
            $table->string('taggable_type')->nullable();
            $table->string('taggable_column')->nullable();
            $table->timestamps();

            $table->foreign('data_type_id')->references('id')->on('data_types')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('data_relationships');
    }
}

