<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('restaurant_admin_details', function (Blueprint $table) {

            // Ensure the column exists and is unsigned
            if (!Schema::hasColumn('restaurant_admin_details', 'restaurant_id')) {
                $table->unsignedBigInteger('restaurant_id')->after('id');
            }

            // Add FK
            // $table->foreign('restaurant_id')
                // ->references('id')
                // ->on('restaurants')
                // ->cascadeOnDelete()
                // ->cascadeOnUpdate();
        });
    }

    public function down()
    {
        Schema::table('restaurant_admin_details', function (Blueprint $table) {
            $table->dropForeign(['restaurant_id']);
        });
    }
};
