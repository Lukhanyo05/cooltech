
@section('title', 'Home | CoolTech')

@section('content')
<!-- Hero Section -->
<section class="bg-gradient-to-br from-blue-100 via-white to-blue-200 py-20">
    <div class="container mx-auto flex flex-col md:flex-row items-center">
        <!-- Hero Text -->
        <div class="w-full md:w-1/2 mb-10 md:mb-0 text-center md:text-left">
            <h1 class="text-5xl font-bold text-blue-700 mb-6">Welcome to CoolTech!</h1>
            <p class="text-xl text-gray-700 mb-6">Your source for the latest in technology news, reviews, and insights.</p>
            <a href="{{ url('/contact') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-8 rounded shadow transition duration-300">Get Started</a>
        </div>
        <!-- Hero Image -->
        <div class="w-full md:w-1/2 flex justify-center">
            <img src="{{ asset('images/logo.png') }}" alt="CoolTech Logo" class="rounded-lg shadow-lg max-h-80">
        </div>
    </div>
</section>

<!-- Latest Articles Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-blue-700 mb-10">Latest Articles</h2>
        
        @php
            use App\Models\Article;
            use Illuminate\Support\Str;
            $articles = Article::with(['category', 'tags'])->latest()->take(5)->get();
        @endphp
        
        @if($articles->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($articles as $article)
                    <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition border border-gray-200">
                        <div class="p-6">
                            <span class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded mb-3">
                                {{ $article->category->name }}
                            </span>
                            
                            <h3 class="text-xl font-bold mb-3">
                                <a href="{{ route('article.show', $article->id) }}" 
                                   class="text-gray-900 hover:text-blue-600 transition">
                                    {{ $article->title }}
                                </a>
                            </h3>
                            
                            <p class="text-gray-600 mb-4 line-clamp-3">
                                {{ Str::limit(strip_tags($article->content), 150) }}
                            </p>
                            
                            <div class="flex items-center justify-between text-sm text-gray-500">
                                <span>{{ $article->created_at->format('M j, Y') }}</span>
                                
                                @if($article->tags->count() > 0)
                                    <div class="flex gap-1">
                                        @foreach($article->tags->take(2) as $tag)
                                            <span class="bg-gray-100 px-2 py-1 rounded text-xs">{{ $tag->name }}</span>
                                        @endforeach
                                        @if($article->tags->count() > 2)
                                            <span class="bg-gray-100 px-2 py-1 rounded text-xs">+{{ $article->tags->count() - 2 }}</span>
                                        @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-8">
                <p class="text-gray-600 text-lg mb-4">No articles found.</p>
                <p class="text-gray-500">Check back soon for the latest tech news and reviews!</p>
            </div>
        @endif
    </div>
</section>

<!-- Features Section -->
<section class="py-16 bg-gray-50">
    <div class="container mx-auto">
        <h2 class="text-3xl font-bold text-center text-blue-700 mb-10">Our Features</h2>
        <div class="flex flex-wrap justify-center gap-8">
            <div class="bg-blue-100 p-6 rounded-lg shadow w-72 text-center">
                <h3 class="text-xl font-bold mb-2">Tech News</h3>
                <p class="text-gray-600">Stay updated with the latest technology trends and breakthroughs.</p>
            </div>
            <div class="bg-blue-100 p-6 rounded-lg shadow w-72 text-center">
                <h3 class="text-xl font-bold mb-2">In-depth Reviews</h3>
                <p class="text-gray-600">Honest reviews of software, hardware, and the latest gadgets.</p>
            </div>
            <div class="bg-blue-100 p-6 rounded-lg shadow w-72 text-center">
                <h3 class="text-xl font-bold mb-2">Expert Insights</h3>
                <p class="text-gray-600">Thought-provoking opinion pieces from industry experts.</p>
            </div>
        </div>
    </div>
</section>
