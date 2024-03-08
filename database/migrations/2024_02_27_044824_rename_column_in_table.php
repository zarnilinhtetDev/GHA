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
        Schema::table('expenses', function (Blueprint $table) {
            $table->renameColumn('transaction_id', 'account_id');
        });
    }

    public function down()
    {
        Schema::table('expenses', function (Blueprint $table) {
            $table->renameColumn('account_id', 'transaction_id');
        });
    }
};
