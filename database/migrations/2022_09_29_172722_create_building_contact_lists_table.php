<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingContactListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_contact_lists', function (Blueprint $table) {
            $table->increments('id');
            $table->Integer('project_id')->default(0)->index();
            $table->Integer('page_id')->default(0)->index();
            $table->string('item_name', 250)->nullable($value = true);
            $table->tinyInteger('item_type')->default(0);
            $table->integer('inserted_by')->default(0);
            $table->integer('updated_by')->default(0);
            $table->tinyInteger('status_active')->default(1);
            $table->tinyInteger('is_deleted')->default(0);
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
        Schema::dropIfExists('building_contact_lists');
    }
}