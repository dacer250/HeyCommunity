<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDailyPapersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_papers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('entity_type')->comment('实例类型');
            $table->integer('entity_id')->index()->commment('实例 ID');

            $table->string('remark')->comment('评注');

            $table->timestamps();
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
        Schema::dropIfExists('daily_papers');
    }
}
