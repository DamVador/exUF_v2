<?php

namespace UserFrosting\Sprinkle\Site\Database\Migrations;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Schema\Builder;
use UserFrosting\Sprinkle\Core\Database\Migration;

class AddCompanyIdEmployeesTable extends Migration
{
    public static $dependencies = [
        '\UserFrosting\Sprinkle\Site\Database\Migrations\CompaniesTable',
        '\UserFrosting\Sprinkle\Site\Database\Migrations\EmployeesTable'
    ];
    public function up()
    {
            $this->schema->table('employees', function (Blueprint $table) {
                $table->unsignedInteger('company_id');
                $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

                $this->schema->enableForeignKeyConstraints();
            });
        }
    

    public function down()
    {
        $this->schema->table('employees', function (Blueprint $table) {
            $this->schema->disableForeignKeyConstraints();
            $table->dropForeign(['company_id']);
        });
    }
}