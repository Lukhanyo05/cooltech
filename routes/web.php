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