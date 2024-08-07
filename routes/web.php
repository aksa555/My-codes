<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;

Route::get('/', function () {
    return view('welcome');
});

// Route::prefix('user')->group(function () {
//     Route::post('register', [UserController::class, 'register']);
//     Route::post('login', [UserController::class, 'login']);
// });

// Route::prefix('admin')->group(function () {
//     Route::post('register', [AdminController::class, 'register']);
//     Route::post('login', [AdminController::class, 'login']);
// });
Route::group(['middleware' => ['web', 'auth']], function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});



Route::group(['prefix' => 'quiz', 'middleware' => ['web', 'auth']], function () {
    Route::get('/', [QuizController::class, 'list'])->name('quiz.list');
    Route::get('/show/{id}', [QuizController::class, 'show'])->name('quiz.show');
    Route::get('/edit/{id}', [QuizController::class, 'edit'])->name('quiz.edit');
    Route::post('/update', [QuizController::class, 'update'])->name('quiz.update');
    Route::post('/delete/{id}', [QuizController::class, 'delete'])->name('quiz.delete');
    Route::get('/create', [QuizController::class, 'create'])->name('quiz.create');
    Route::post('/create', [QuizController::class, 'store'])->name('quiz.store');
    
    

});

Route::group(['prefix' => 'question', 'middleware' => ['web', 'auth']], function () {
    Route::get('/', [QuestionController::class, 'list'])->name('question.list');
    Route::get('/show/{id}', [QuestionController::class, 'show'])->name('question.show');
    Route::get('/edit/{id}', [QuestionController::class, 'edit'])->name('question.edit');
    Route::post('/update', [QuestionController::class, 'update'])->name('question.update');
    Route::post('/delete/{id}', [QuestionController::class, 'delete'])->name('question.delete');
    Route::get('/create', [QuestionController::class, 'showQuizForm'])->name('question.create');
    Route::post('/create', [QuestionController::class, 'submitQuiz'])->name('question.store');
});