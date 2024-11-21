<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $book->title }}</title>
</head>

<body>
    <h1>{{ $book->title }}</h1>
    <iframe src="{{ $filepath }}" width="100%" height="600px"></iframe>
    <p>
        <a href="{{ $filepath }}" target="_blank">تحميل الكتاب</a>
    </p>
    <p>
        <a href="{{ route('books.index') }}" target="_self">Home</a>
    </p>
</body>

</html>
