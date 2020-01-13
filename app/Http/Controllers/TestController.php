<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

use App\Response;

class TestController extends Controller
{
	public function showUrl()
	{
		return view('show_url');
	}

	public function showForm()
	{
		return view('show_form');
	}

	public function accessUrl(Request $request)
	{
		if(!filter_var($request->url, FILTER_VALIDATE_URL)){
			die('URL invalid!');
		}
		$data['headers'] = get_headers($request->url);
		$data['response_code'] = $data['headers'][0];

		try{
			$client = new \GuzzleHttp\Client();
	        $response = $client->request('get', $request->url, []);

	        $data['body'] = $response->getBody()->getContents();
        } catch (\Exception $e){
       		$data['body'] = 'Eroare: '.$e;
       	}

       	Response::create([
       		'method' => 'GET',
       		'url' => $request->url,
       		'status_code' => $data['response_code'],
       		'headers' => $data['headers'],
       		'body' => $data['body']
       	]);

		return view('url_response', $data);
	}

	public function submitForm(Request $request)
	{
		if(!filter_var($request->url, FILTER_VALIDATE_URL)){
			die('URL invalid!');
		}

		$data['headers'] = get_headers($request->url);
		$data['response_code'] = $data['headers'][0];

       	try{
       		$client = new \GuzzleHttp\Client();
			$params = [
	            'param1' => $request->param1,
	            'param2' => $request->param2
	        ];

       		$response = $client->request('post', $request->url, [
	            'query' => $params
	        ]);

	        $data['body'] = $response->getBody()->getContents();
       	} catch (\Exception $e){
       		$data['body'] = 'Eroare: '.$e;
       	}

       	Response::create([
       		'method' => 'POST',
       		'url' => $request->url,
       		'parameters' => $params,
       		'status_code' => $data['response_code'],
       		'headers' => $data['headers'],
       		'body' => $data['body']
       	]);

		return view('form_response', $data);
	}
}