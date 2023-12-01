<!-- resources/views/trivia/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trivia App</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <header class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Trivia App</a>
        </div>
    </header>
    <x-alert class="alert alert-success"/>
    <div class="container mt-4">
        <h1 class="mb-4">Welcome to the Trivia App!</h1>

        <!-- Your Bootstrap-styled content goes here -->
        <form>
            <!-- Your form fields go here -->
            <div class="mb-3">
                <label for="fullName" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="fullName" name="fullName" required>
            </div>

            <!-- Other form fields... -->

            <button type="submit" class="btn btn-primary">Start Trivia</button>
        </form>
    </div>

    <footer class="mt-5">
        <div class="container text-center">
            <p>&copy; 2023 Trivia App. All rights reserved.</p>
        </div>
    </footer>

    <!-- Bootstrap JS (optional, only if needed) -->
    <!-- Add the following lines before the closing body tag -->
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
</body>
</html>
