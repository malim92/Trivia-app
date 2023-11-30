<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TriviaController extends Controller
{
    public function fetchQuestions(Request $request)
    {
        // Retrieve parameters from the form submission
        $amount = $request->input('amount');
        $difficulty = $request->input('difficulty');
        $type = $request->input('type');

        // Make a request to the Open Trivia Database API
        $client = new Client();
        $response = $client->get('https://opentdb.com/api.php', [
            'query' => [
                'amount' => $amount,
                'difficulty' => $difficulty,
                'type' => $type,
            ],
        ]);

        // Parse the response
        $data = json_decode($response->getBody(), true);

        // Assuming the structure of the Open Trivia Database response
        $questions = $data['results'];

        // You can now handle these questions, store them in the database, or pass them to a view
        // For simplicity, let's just return them in this example
        return $questions;
    }

    public function index()
    {
        // Your logic for handling the root path
        return view('trivia.index');
    }
}
