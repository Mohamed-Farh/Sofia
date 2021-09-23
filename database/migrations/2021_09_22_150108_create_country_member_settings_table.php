<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryMemberSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('country_member_settings', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('member_id')->unsigned();
            $table->foreign('member_id')->references('id')->on('members')
					->onDelete('cascade')
					->onUpdate('cascade');
            $table->string('subject')->nullable();
            $table->longText('message')->nullable();

            $table->integer('sender_member_id')->nullable();

            $table->enum('status', ['0', '1'])->default('0');
            $table->enum('read', ['0', '1'])->default('0');
            $table->enum('show', ['0', '1'])->default('0');
            $table->enum('like', ['0', '1'])->default('0');
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
        Schema::dropIfExists('country_member_settings');
    }
}
