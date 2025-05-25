<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AfishaController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;
use PHPUnit\Framework\Attributes\Ticket;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//главная страница
Route::get('/', [AfishaController::class, 'showIndex'])->name('pages.index');

// это авторег
Route::get('/register', [UserController::class, 'showRegister'])->name('pages.register');

Route::post('/register/store', [UserController::class, 'register'])->name('register');

Route::get('/login', [UserController::class, 'showLogin'])->name('pages.login');

Route::post('/login/store', [UserController::class, 'login'])->name('login');

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::prefix('admin')->group(function () {
    Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/create/afisha', [AfishaController::class, 'showCreate'])->name('pages.create');

Route::post('/afisha/create', [AfishaController::class, 'createIndex'])->name('tovar.creates');

Route::get('/edit/{id}', [AfishaController::class, 'showEdit'])->name('tovar.edit');

Route::post('/update/{id}', [AfishaController::class, 'updateIndex'])->name('update');

Route::delete('/afisha/{id}/destroy', [AfishaController::class, 'destroy'])->name('destroy');

Route::get('/admin', [AfishaController::class, 'indexAdmin'])->name('admin.index');

});
});

Route::get('/katalog', [AfishaController::class, 'showCatalog'])->name('page.catalog');

Route::get('/afisha/{id}', [AfishaController::class, 'showShow'])->name('pages.show');

Route::get('/design', [AfishaController::class, 'showDesign'])->name('pages.design');

Route::get('/contact', [AfishaController::class, 'showContact'])->name('pages.contact');

Route::get('/useracc', [UserController::class, 'indexUser'])->name('pages.useracc');

// это покупка билетов
Route::get('/schemezal/{id}', [TicketController::class, 'schemaZala'])->name('pages.schemezala');

Route::post('/schemezal/store', [TicketController::class, 'createTickets'])->name('purchuase.ticket');

Route::post('/schemezal/poluchienie', [TicketController::class, 'getPurchaseTicket'])->name('gets.tickets');

Route::get('/return-ticket/{ticket}', [TicketController::class, 'destroy']);

//это создание новостей

Route::get('/create/news', [NewsController::class, 'CreateNews'])->name('pages.createnews');

Route::post('/afisha/createnews', [NewsController::class, 'createIndexNews'])->name('tovar.createsnews');

Route::get('/editnews/{id}', [NewsController::class, 'EditNews'])->name('tovar.editnews');

Route::post('/updatenews/{id}', [NewsController::class, 'updateIndexNews'])->name('updatenews');

Route::delete('/afisha/{id}/destroynews', [NewsController::class, 'destroyNews'])->name('destroynews');

Route::get('/newspage', [NewsController::class, 'showNews'])->name('indexnews');

Route::get('/news/{id}', [NewsController::class, 'showNew'])->name('news.show');

Route::delete('/return_ticket/{id}', [TicketController::class, 'returnTicket'])->middleware('auth');
