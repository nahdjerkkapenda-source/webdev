<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>dashboard</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    @include('partials.sidebar')
    <main class="">
        
        <h1>Welcome, {{ $user->name }}</h1>

    </main>
    
</body>
</html>