<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ContactController;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactFormSubmitted;
use Illuminate\Support\Facades\Mail;

// Simple test route
Route::get("/test-simple", function() {
    return "Test route works at " . now();
});

// Homepage
Route::get("/", [ArticleController::class, "home"])->name("home");

// About page
Route::view("/about", "about");

// Contact page
Route::view("/contact", "contact");

// Contact form submission
Route::post("/contact", function (Request $request) {
    $validated = $request->validate([
        "name" => "required|string|max:255",
        "email" => "required|email",
        "message" => "required|string",
    ]);
    $contact = Contact::create($validated);
    Mail::to("admin@cooltech.com")->send(new ContactFormSubmitted($contact));
    return redirect("/thank-you");
})->name("contact.submit");

// Thank you page
Route::view("/thank-you", "thank-you");

// Articles
Route::get("/articles", [ArticleController::class, "index"])->name("articles.index");
Route::get("/article/{id}", [ArticleController::class, "show"])->name("article.show");

// Categories and Tags
Route::get("/category/{slug}", [CategoryController::class, "show"])->name("category.show");
Route::get("/tag/{slug}", [TagController::class, "show"])->name("tag.show");

// Legal page
Route::view("/legal", "legal")->name("legal");

// Search
Route::get("/search", [SearchController::class, "index"])->name("search");
Route::post("/search", [SearchController::class, "search"])->name("search.perform");

// Resource routes
Route::resource("categories", CategoryController::class)->except(["show"]);
Route::resource("tags", TagController::class)->except(["show"]);
Route::resource("articles", ArticleController::class)->except(["index", "show"]);

