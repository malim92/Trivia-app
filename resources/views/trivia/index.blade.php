<!-- resources/views/trivia/index.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trivia App</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body style=" background-image: url('https://www.faarmembers.com/wp-content/uploads/2019/01/trivia-background.jpg')">
    <header class="navbar navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Trivia App</a>
        </div>
    </header>

    <div class="container mt-4">
        <h1 class="mb-4 title-home">Welcome to the Trivia App!</h1>

        <form action="{{ route('trivia.fetchQuestions') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="fullName" placeholder="First name">Full Name</label>
                <input type="text" class="form-control" id="fullName" name="fullName" required>
            </div>
            <div class="form-group">
                <label for="email">Email address</label>
                <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="questions-num" >Number of questions</label>
                <input type="number" class="form-control" id="questions-num" max=50 name="questions-num" required>
            </div>
            <div class="form-group">
                <label for="difficulty">Select difficulty</label>
                <select class="form-control" name="difficulty" id="difficulty" required>
                    <option value="easy">Easy</option>
                    <option value="medium">Medium</option>
                    <option value="hard">Hard</option>
                </select>
            </div>
            <div class="form-group">
                <label for="type">Select type</label>
                <select class="form-control" name="type" id="type">
                    <option value="multiple">Multiple Choice</option>
                    <option value="boolean">True/False</option>
                </select>
            </div>
            
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