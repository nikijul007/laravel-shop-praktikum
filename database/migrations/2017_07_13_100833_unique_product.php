<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UniqueProduct extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
            if (Schema::hasColumn('products', 'unique_product' )) {
            
                Schema::table('products', function (Blueprint $table) {
                $table->unique(['title', 'desciption'], 'unique_product');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
    }

}
