<?php

use App\Models\Categories;
use App\Models\Companys;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacanciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->unsignedBigInteger('category_id');
            $table->string('title');
            $table->text('description');
            $table->text('qualifications');
            $table->decimal('salary_intro', 10, 2);
            $table->decimal('salary_final', 10, 2);
            $table->tinyInteger('quantity');
            $table->string('localization');
            $table->string('model');
            $table->string('time');
            $table->string('hiring_type');
            $table->string('level');
            $table->string('situation');
            $table->string('slug');
            $table->foreign('company_id')->references('id')->on('companys')->onDelete('cascade');;
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');;
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
        Schema::table('vacancies', function(Blueprint $table){
            $table->dropForeign(Companys::class);
            $table->dropForeign(Categories::class);
        });
        Schema::dropIfExists('vacancies');
    }
}
