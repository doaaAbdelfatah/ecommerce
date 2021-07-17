<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->decimal("price" , 12,2);
            $table->enum("color" ,["red" ,"black" ,"others"]);
            $table->boolean("active")->default(true);
            $table->unsignedBigInteger("vendor_id")->nullable();
            $table->foreign("vendor_id")->references("id")->on("vendors");
            $table->foreignId("category_id")->nullable()->constrained("categories");
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
        Schema::dropIfExists('products');
    }
}
