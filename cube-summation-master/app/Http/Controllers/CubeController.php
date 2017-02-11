<?php

namespace App\Http\Controllers;

use App\Classes\TestCase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;

class CubeController extends Controller
{
    private $results = array();

    public function index(Request $request)
    {

      if( empty($request->input) ){
        return view('welcome');
      }

      $userInput = $this->inputToArray($request->input);
      $count = 0;

      $T = (int) $userInput[$count++];

      for ($i=0; $i < $T ; $i++) {

        $tmp = explode(' ', $userInput[$count++]);
        $N = (int) $tmp[0];
        $M = (int) $tmp[1];

        $commands = array_slice($userInput,$count,$M);

        $testCase = new TestCase($N,$M,$commands);
        $testCase->run();

        $count = $count + $M;

        foreach ($testCase->results() as $result) {
          $this->results[] = $result;
        }
      }

      return view('welcome',['results' => $this->results]);

    }

    private function inputToArray($input)
    {
      $text = trim($input);
      $textArray = explode("\n", $text);
      return array_filter($textArray, 'trim');
    }
}
