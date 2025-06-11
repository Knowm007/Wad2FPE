<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Schema;
use App\Models\Blueprint;

class Task extends Model
{
  public function up()
{
    Schema::create('tasks', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('user_id');
        $table->string('title');
        $table->string('status')->default('pending'); // halimbawa
        $table->timestamps();

        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    });
}

}
