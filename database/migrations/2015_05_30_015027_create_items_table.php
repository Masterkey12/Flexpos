<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('items', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('upc_ean_isbn',90)->nullable();
			$table->string('item_name',90);
			$table->integer('category_id')->nullable();
			$table->string('size',20)->nullable();
			$table->text('description')->nullable();
			$table->string('avatar', 255)->default('no-foto.png');
			$table->decimal('cost_price',9, 2);
			$table->decimal('selling_price',9, 2);
			$table->integer('quantity')->default(1);
			$table->integer('type')->default(1); // 1 active 0 inactive 2 one_time
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
		Schema::drop('items');
	}

}
