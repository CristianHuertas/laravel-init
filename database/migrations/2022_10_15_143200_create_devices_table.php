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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            //relaciones
            $table->unsignedBigInteger('tipe_id');
            $table->foreign('tipe_id')->references('id')->on('types'); //llave foranea con la tapla tipes

            $table->unsignedBigInteger('sos_id');
            $table->foreign('sos_id')->references('id')->on('sos'); //llave foranea con la tapla sos
            // campos tabla propia
            $table->string('name');
            $table->string('description')->nullable();
            $table->boolean('active')->default(true);
            $table->string('serial_number')->nullable();
            $table->string('mac_address')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('model')->nullable();
            $table->string('manufacturer')->nullable();
            $table->string('firmware')->nullable();
            $table->integer('stock')->default(1);
            $table->integer('hdd')->nullable();
            $table->integer('ram')->nullable();
            $table->string('cpu')->nullable();
            $table->string('gpu')->nullable();
            $table->integer('total_slots')->nullable();
            $table->text('history')->nullable(); //text es string mas grande o usar longText
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
        Schema::dropIfExists('devices');
    }
};
