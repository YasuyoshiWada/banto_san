<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToUsersTable extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            // statusカラムが存在しない場合のみ追加
            if (!Schema::hasColumn('users', 'status')) {
                $table->enum('status', ['active', 'inactive'])->after('password')->default('active');
            }

            // From AddColumnsToUsersTable migration
            $table->string('username')->after('name');
            $table->longText('image')->nullable();
            
            $table->foreignId('role_id')->nullable()->after('image');
            $table->string('role_name')->nullable()->default(null);

            $table->foreignId('branch_id')->nullable();
            $table->string('branch_name')->nullable()->default(null);
            
            $table->integer('employee_number')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('address')->nullable();
            $table->timestamp('BirthDate')->nullable();

    });

    

    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'username',
                'status',
                'address',
                'image',
                'employee_number',
                'gender',
                'BirthDate',
                'role_id',
                'role_name',
                'branch_id',
                'branch_name',

            ]);

        });
    }
}
