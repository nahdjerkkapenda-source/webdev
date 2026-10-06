<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/books.css" class="">
</head>

<body class="with-sidebar">
    @include('partials.sidebar')
    <main class="books-main">

        <header class="search-header">
            <form action="/books" method="GET" class="search-form">
                <input 
                    type="search" 
                    name="search"
                    placeholder="🔍︎ Search for books..." 
                    class="search-bar"
                    value="{{ request('search') }}"
                >

                <div class="dropdowns-wrapper">
                    <label for="category" class="dropdown-label">Filter by:</label>

                    <select name="filter" class="dropdown-category">
                        <option value="">Category</option>
                        <option value="fiction" {{ request('filter') == 'fiction' ? 'selected' : '' }}>Fiction</option>
                        <option value="non-fiction" {{ request('filter') == 'non-fiction' ? 'selected' : '' }}>Non-Fiction</option>
                        <option value="references" {{ request('filter') == 'references' ? 'selected' : '' }}>References</option>
                        <option value="children-&-young-adults" {{ request('filter') == 'children-&-young-adults' ? 'selected' : '' }}>Children & Young Adult</option>
                    </select>

                    <!--<select name="status" class="dropdown-status">
                        <option value="">Status</option>
                        <option value="available">Available</option>
                        <option value="borrowed">Borrowed</option>
                        <option value="reserved">Reserved</option>
                        <option value="lost">Lost</option>
                    </select>

                    <select name="condition" class="dropdown-condition">
                        <option value="">Condition</option>
                        <option value="new">New</option>
                        <option value="good">Good</option>
                        <option value="fair">Fair</option>
                        <option value="poor">Poor</option>
                    </select>-->

                    <button type="submit" class="button-apply">Apply</button>
                </div>
            </form>
                        
            <button class="add-book" id="add-book">+ Add Book</button>

            <div class="modal" id="add-book-modal">
            <form action="/add-book" method="POST" enctype="multipart/form-data" class="modal-card" >
                @csrf
                <h2>Add Book</h2>
                <input type="text" placeholder="Book Title" name="title">
                <input type="text" placeholder="Author" name="author">
                <input type="text" placeholder="ISBN" name="isbn">
                <input type="text" placeholder="Publisher" name="publisher">
                <input type="number" placeholder="Publication Year" name="publication_year">
            
                <select name="category">
                    <option value="">Category</option>
                    <option value="fiction">Fiction</option>
                    <option value="non-fiction">Non-Fiction</option>
                    <option value="references">References</option>
                    <option value="children-&-young-adults">Children & Young Adult</option>
                </select>

                <input type="text" placeholder="Shelf Location" name="shelf_location">
                <textarea placeholder="Description" name="description"></textarea>
                <input type="file" name="cover_image" accept="image/*">
                <label for="number">Number of copies:</label>
                <input type="number" name="copies" value="1" min="1">
                


                <!--<select name="status">
                    <input type="text" placeholder="Accession Number" name="accession_number">
                    <option value="available">Available</option>
                    <option value="borrowed">Borrowed</option>
                    <option value="reserved">Reserved</option>
                    <option value="lost">Lost</option>
                </select>
                <select name="condition">
                    <option value="new">New</option>
                    <option value="good">Good</option>
                    <option value="fair">Fair</option>
                    <option value="poor">Poor</option>
                </select>
                -->
                <button>Save Book</button>
                <button type="button" id="close-modal-button">Cancel</button>
            </form>
            </div>
        </header>  

        <section class="books-section">
            @foreach ($books as $book)

            <div class="book-card">

                @if ($book->cover_image)
                    <img 
                        src="{{ asset('storage/' . $book->cover_image) }}" 
                        alt="{{ $book->title }}"
                        class="book-cover"
                    >
                @endif

                <h2 class="book-title">
                    {{ $book->title }}
                </h2>

                <p class="book-author">
                    {{ $book->author }}
                </p>

                <p>
                    {{ $book->copies->count() }} copies
                </p>

            </div>

            @endforeach

        </section>
    </main>
    <script src="/js/books.js"></script>
</body>
</html>