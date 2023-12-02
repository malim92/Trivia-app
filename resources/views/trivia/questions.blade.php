<!-- resources/views/questions.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <title>Trivia Questions</title>
</head>

<body>
    <header>
        <center>
            <h1>Trivia Questions</h1>
        </center>
    </header>
    <section class="question-list">
        @foreach ($questions as $question)
        <div class="card text-center">
            <div class="card-header">
                <strong>Category:</strong> {{ $question['category'] }} <br>
            </div>
            <div class="card-body">
                <strong>Question:</strong> {{ $question['question'] }} <br>
                <strong>All Answers:</strong>
                <div class="answer-list">
                    @foreach ($question['all_answers'] as $allAnswer)
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="{{ $allAnswer }}" value="{{ $allAnswer }}" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            {{ $allAnswer }}
                        </label>
                    </div>
                    @endforeach
                </div>

                <br>
            </div>
            <div class="card-footer text-muted">
                <strong>Correct Answer:</strong> {{ $question['correct_answer'] }}
            </div>
        </div>
        @endforeach
    </section>
    <center>
        <a href="http://127.0.0.1:8000/" class="btn btn-primary">Go back to form</a>.
    </center>
</body>

</html>