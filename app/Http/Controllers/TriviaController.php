<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class TriviaController extends Controller
{

    public function index()
    {
        return view('trivia.index');
    }

    public function fetchQuestions(Request $request)
    {
        $name = $request->input('fullName');
        $amount = $request->input('questions-num');
        $difficulty = $request->input('difficulty');
        $type = $request->input('type');

        $questions = $this->getQuestionsFromApi( $amount, $difficulty, $type );
        // return $questions;
        return view('trivia.questions', ['questions' => $questions]);
    }

    private function getQuestionsFromApi( $amount, $difficulty, $type )
    {
        $client = new Client([
            'base_uri' => 'https://opentdb.com/api.php/',
            'verify' => false
        ]);

        $sub_url = "?amount=$amount&difficulty=$difficulty&type=$type";
        // return $sub_url;
        $response = $client->get($sub_url);

        $data = json_decode($response->getBody(), true);

        $questions = $data['results'];

        $fetchedQuestions = $this->sortAndValidate($questions);

        return $fetchedQuestions;
    }
    public function sortAndValidate($questionsArray)
    {
        $filteredQuestions = array_filter($questionsArray, function ($question) {
            if (!str_contains($question['category'], 'Entertainment')) {
                return $question;
            }
        });

        usort($filteredQuestions, function ($a, $b) {
            return strcmp($a['category'], $b['category']);
        });

        //combine correct and inccorect answers and shuffle

        foreach ($filteredQuestions as &$question) {
            // Combine correct_answer and incorrect_answers into a new property
            $question['all_answers'] = array_merge([$question['correct_answer']], $question['incorrect_answers']);
        
            // Shuffle the answers
            shuffle($question['all_answers']);
        }
        
        // Unset the reference to avoid potential issues
        // unset($filteredQuestions);

        return $filteredQuestions;
    }
}
