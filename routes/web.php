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
use App\Http\Controllers\SearchController;
use App\Http\Controllers\WriterConsoleController;

// Homepage
Route::get('/', function () {
    $products = Product::latest()->take(3)->get();
    return view('home', compact('products'));
});

// About page
Route::view('/about', 'about');

// Contact page (GET)
Route::view('/contact', 'contact');

// Contact form submission (POST)
Route::post('/contact', function (Request $request) {
    // Validate input
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'message' => 'required|string',
    ]);

    // Store in database
    $contact = Contact::create($validated);

    // Send email to admin (edit to your admin email)
    Mail::to('your-admin@email.com')->send(new ContactFormSubmitted($contact));

    // Redirect to thank you page
    return redirect('/thank-you');
})->name('contact.submit');

// Thank you page
Route::view('/thank-you', 'thank-you');

// Admin list of contact submissions (requires authentication in real projects)
Route::get('/admin/contacts', [ContactController::class, 'index'])->name('admin.contacts.index');

// Articles
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('/articles', [ArticleController::class, 'store'])->name('articles.store');
Route::get('/articles/{article}', [ArticleController::class, 'show'])->name('articles.show');
Route::get('/articles/{article}/edit', [ArticleController::class, 'edit'])->name('articles.edit');
Route::put('/articles/{article}', [ArticleController::class, 'update'])->name('articles.update');
Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])->name('articles.destroy');

// Categories and Tags (show by id/slug)
Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
Route::get('/tags/{tag}', [TagController::class, 'show'])->name('tags.show');

// Legal page
Route::view('/legal', 'legal')->name('legal');

// Resource routes for categories and tags
Route::resource('categories', CategoryController::class)->except(['show']);
Route::resource('tags', TagController::class)->except(['show']);

// Search routes
Route::get('/search', [SearchController::class, 'show'])->name('search.show');
Route::get('/search/article', [SearchController::class, 'searchArticle'])->name('search.article');
Route::get('/search/category', [SearchController::class, 'searchCategory'])->name('search.category');
Route::get('/search/tag', [SearchController::class, 'searchTag'])->name('search.tag');

// Writer's Console (optional feature)
Route::get('/writer-console', [WriterConsoleController::class, 'show'])->name('writer.console');
Route::post('/writer-console/auth', [WriterConsoleController::class, 'auth'])->name('writer.console.auth');
Route::post('/writer-console/submit', [WriterConsoleController::class, 'submit'])->name('writer.console.submit');