<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactFormSubmitted;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\SearchController; // <- Add this
use App\Http\Controllers\WriterConsoleController; // <- If doing writer's console

// Homepage (Home)
Route::get('/', function () {
    $products = Product::latest()->take(3)->get();
    return view('home', compact('products'));
});

// About page
Route::view('/about', 'about');

// Contact page (GET for the form)
Route::view('/contact', 'contact');

// Contact page (POST for form submission)
Route::post('/contact', function (Request $request) {
    // Step 1: Validate input
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'message' => 'required|string',
    ]);

    // Step 2: Store in the database
    $contact = Contact::create($validated);

    // Step 3: Send email to admin (replace with your email)
    Mail::to('your-admin@email.com')->send(new ContactFormSubmitted($contact));

    // Step 4: Redirect to thank you page
    return redirect('/thank-you');
});

// Thank you page
Route::view('/thank-you', 'thank-you');

// Admin list of contact submissions (requires authentication)
Route::get('/admin/contacts', [ContactController::class, 'index']);

// Article, Category, Tag routes
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/tags/{tag}', [TagController::class, 'show'])->name('tags.show');

// Legal page
Route::view('/legal', 'legal')->name('legal');

Route::resource('categories', CategoryController::class);
Route::resource('tags', TagController::class);

// ----------------- NEW: SEARCH PAGE ROUTES -----------------
Route::get('/search', [SearchController::class, 'show'])->name('search.show');
Route::get('/search/article', [SearchController::class, 'searchArticle'])->name('search.article');
Route::get('/search/category', [SearchController::class, 'searchCategory'])->name('search.category');
Route::get('/search/tag', [SearchController::class, 'searchTag'])->name('search.tag');

// ----------------- OPTIONAL: WRITER'S CONSOLE -----------------
Route::get('/writer-console', [WriterConsoleController::class, 'show'])->name('writer.console');
Route::post('/writer-console/auth', [WriterConsoleController::class, 'auth'])->name('writer.console.auth');
Route::post('/writer-console/submit', [WriterConsoleController::class, 'submit'])->name('writer.console.submit');