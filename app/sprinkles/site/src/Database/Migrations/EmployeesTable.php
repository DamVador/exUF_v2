<?php

namespace UserFrosting\Sprinkle\Site\Database\Migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;
use UserFrosting\Sprinkle\Core\Database\Migration;

class EmployeesTable extends Migration
{
    public function up()
    {
        if (!$this->schema->hasTable('employees')) {
            $this->schema->create('employees', function (Blueprint $table) {
                $table->increments('id');
                $table->string('first_name', 50);
                $table->string('last_name', 50);
                $table->string('email')->unique();
                $table->string('phone_number', 30)->unique();
                $table->timestamps();

                $table->engine = 'InnoDB';
                $table->collation = 'utf8_unicode_ci';
                $table->charset = 'utf8';

            });
        }
    }

    public function down()
    {
        $this->schema->drop('employees');
    }
}