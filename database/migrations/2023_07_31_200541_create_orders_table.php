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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreign("client_id", 'client_id_fk')->references("id")->on("clients");
            $table->foreign("disc_id", 'disc_id_fk')->references("id")->on("discs");
            $table->integer("quantity");
            $table->decimal("total_value", 10, 2);
            $table->string("status", 20);
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
        Schema::dropIfExists('orders');
    }
};
