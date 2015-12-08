<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFaqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('polyfaq_faqs', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('title')->default('');
            $table->text('content')->default('');
            $table->integer('sorting')->default(0);

            $table->morphs('faqable');

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('polyfaq_faqs', function (Blueprint $table) {
            $table->drop();
        });
    }
}
