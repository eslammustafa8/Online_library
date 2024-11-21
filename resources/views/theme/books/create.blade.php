<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card p-4 shadow-lg">
                    @if (session('status-book'))
                        <div class="alert alert-success">
                            {{ session('status-book') }}
                        </div>
                    @endif
                    <h2 class="text-center mb-4">Add New Book</h2>
                    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <!-- Book Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Book Name</label>
                            <input type="text" class="form-control" id="name" name="book_name"
                                placeholder="Enter book name">
                            @error('book_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Author Name -->
                        <div class="mb-3">
                            <label for="author" class="form-label">Author Name</label>
                            <input type="text" class="form-control" id="author" name="author"
                                placeholder="Enter author name">
                            @error('author')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="book_file" class="form-label">book File</label>
                            <input type="file" class="form-control" id="book_file" name="book_file">
                            @error('book_file')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Category -->
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" id="category" name="category_id">
                                <option selected value="">Select a category</option>
                                @if (count($categories) > 0)
                                    @foreach ($categories as $category)
                                        <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @endif

                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Price -->
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price" name="price"
                                placeholder="Enter price">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-warning w-100">Add Book</button>
                    </form>
                    <a href="{{ route('books.index') }}" class="btn btn-warning w-100">Home</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
