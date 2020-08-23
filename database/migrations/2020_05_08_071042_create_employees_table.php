<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->bigIncrements('employee_id');
            $table->string('employee_code',55 );
            $table->string('employee_name',55 );
            $table->date('employee_datebirth');
            $table->enum('employee_gender',['male','female']);
            $table->text('employee_address',225 );
            $table->string('employee_zipcode', 22);
            $table->string('employee_phone',22 );
            $table->string('employee_email',22 );
            $table->enum('employee_role',['admin', 'employee']);
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
        Schema::dropIfExists('employees');
    }
}
