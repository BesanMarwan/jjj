<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCategoriesTable extends Migration {

	public function up()
	{
		Schema::create('categories', function(Blueprint $table) {
			$table->id();
			$table->string('name', 30);
			$table->text('description')->nullable();
			$table->unsignedTinyInteger('status')->default(1);
			//$table->enum('status',['0','1'])->default('1');
			$table->timestamps();

		});
	}

	public function down()
	{
		Schema::drop('categories');
	}
}
