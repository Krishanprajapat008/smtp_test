<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmtpRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('smtp_records', function (Blueprint $table) {
            $table->id();
            $table->string('Site_Name');
            $table->string('SMTP_Driver');
            $table->string('SMTP_Host');
            $table->integer('SMTP_Port');
            $table->string('Username');
            $table->string('SMTP_Password');
            $table->string('From_Name');
            $table->enum('SMTP_Encryption',['TLS','SSL']);
            $table->string('From_Email');         
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
        Schema::dropIfExists('smtp_records');
    }
}
