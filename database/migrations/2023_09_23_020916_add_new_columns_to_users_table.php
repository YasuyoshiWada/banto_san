<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreignId('branch_id')->nullable()->constrained()->after('role_id');
            $table->integer('employee_number')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->timestamp('birthdate')->nullable();
            $table->string('name')->after('id');
        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('employee_number');
            $table->dropColumn('gender');
            $table->dropColumn('birthdate');

            $table->dropForeign(['branch_id']);
        });
    }
}
