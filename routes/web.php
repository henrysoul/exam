<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('exam.question.questions');
});

Route::get('question_categories','QuestionsController@question_categories')->name('question_categories');
Route::post('category_store','QuestionsController@category_store')->name('category_store');
Route::post('category_update','QuestionsController@category_update')->name('category_update');
Route::get('category_delete/{id}','QuestionsController@category_delete')->name('category_delete');

Route::get('questions_list','QuestionsController@questions_index')->name('questions_list');
Route::get('question_delete/{id}','QuestionsController@questions_index')->name('question_delete');
Route::post('questions_store','QuestionsController@questions_store')->name('questions_store');


Route::get('exams','QuestionsController@exams')->name('exams');
Route::post('exam_store','QuestionsController@exam_store')->name('exam_store');
Route::post('exam_update','QuestionsController@exam_update')->name('exam_update');
Route::get('exam_delete/{id}','QuestionsController@exam_delete')->name('exam_delete');

Route::get('questions','QuestionsController@questions')->name('questions');
Route::post('fetch_questions','QuestionsController@fetch_questions')->name('fetch_questions');