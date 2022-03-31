<?php

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('user_book', function (Blueprint $table) {


            $table->foreignIdFor(User::class)
                ->constrained();

            $table->foreignIdFor(Book::class)
                ->constrained();

            $table->primary(['user_id', 'book_id']);

            $table->date('add_date');
            $table->unsignedInteger('completed_readings');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('user_books');
    }
};
