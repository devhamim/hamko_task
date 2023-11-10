<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ChatGptController extends Controller
{
    public function generateResponse(Request $request)
    {
        $apiKey = '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';
        $apiEndpoint = 'https://api.openai.com/v1/engines/davinci-codex/completions';
        $input = $request->input('user_input');
        $response = $this->makeOpenAIRequest($apiEndpoint, $apiKey, $input);
        $generatedResponse = $response['choices'][0]['text'];

        return response()->json(['response' => $generatedResponse]);
    }

    private function makeOpenAIRequest($endpoint, $apiKey, $input)
    {
        $client = new \GuzzleHttp\Client();

        $response = $client->post($endpoint, [
            'headers' => [
                'Content-Type' => 'application/json',
                'Authorization' => 'Bearer ' . $apiKey,
            ],
            'json' => [
                'prompt' => $input,
                'max_tokens' => 100,
            ],
        ]);
        return json_decode($response->getBody(), true);
    }


}
