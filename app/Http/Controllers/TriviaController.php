<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TriviaController extends Controller
{
    public function fetchQuestions(Request $request)
    {
        // Retrieve parameters from the form submission
        $name = $request->input('fullName');
        $amount = $request->input('questions-num');
        $difficulty = $request->input('difficulty');
        $type = $request->input('type');
        // print_r($name);die;
        // Make a request to the Open Trivia Database API
        

        $client = new Client([
            'base_uri' => 'https://opentdb.com/api.php',
            'verify' => false
        ]);

        $response = $client->get('?amount=1&category=24&difficulty=easy&type=multiple', [
            // 'query' => [
            //     'amount' => $amount,
            //     'difficulty' => $difficulty,
            //     'type' => $type,
            // ],
        ]);

        // Parse the response
        $data = json_decode($response->getBody(), true);

        // Assuming the structure of the Open Trivia Database response
        $questions = $data['results'];

        // You can now handle these questions, store them in the database, or pass them to a view
        // For simplicity, let's just return them in this example
        return $data;
    }

    public function index()
    {

        // Your logic for handling the root path
        return view('trivia.index');
    }
}
