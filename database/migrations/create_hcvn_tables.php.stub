<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHcvnTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableNames = config('hcvn.table_names');

        if (empty($tableNames)) {
            throw new \Exception('Error: config/hcvn.php not found and defaults could not be merged. Please publish the package configuration before proceeding.');
        }

        Schema::create($tableNames['provinces'], function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('slug')->index();
            $table->string('type');
            $table->string('name_with_type');
            $table->string('code')->index();
        });

        Schema::create($tableNames['districts'], function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('type');
            $table->string('slug')->index();
            $table->string('name_with_type');
            $table->string('path');
            $table->string('path_with_type');
            $table->string('code')->index();
            $table->string('parent_code')->index();
        });

        Schema::create($tableNames['wards'], function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('type');
            $table->string('slug')->index();
            $table->string('name_with_type');
            $table->string('path');
            $table->string('path_with_type');
            $table->string('code')->index();
            $table->string('parent_code')->index();
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $tableNames = config('hcvn.table_names');

        if (empty($tableNames)) {
            throw new \Exception('Error: config/hcvn.php not found and defaults could not be merged. Please publish the package configuration before proceeding, or drop the tables manually.');
        }

        Schema::drop($tableNames['provinces']);
        Schema::drop($tableNames['districts']);
        Schema::drop($tableNames['wards']);
    }
}
