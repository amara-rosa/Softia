<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class TestController extends Controller
{
	public function view()
	{
		$client = new \GuzzleHttp\Client();

		$params = [
            'api_key' => 'm1TjeAgd63S3urgJwVvIJ3djL4tb5bwPyqsEOYKd'
        ];
       	
        $response = $client->request('get', "https://api.nasa.gov/planetary/apod", [
            'query' => $params
        ]);

        $data['data'] = json_decode($response->getBody()->getContents());

		return view('view', $data);
	}

	public function change(Request $request)
	{
		if($request->submit == 'next'){
			if(strtotime($request->date) <= strtotime(date('Y-m-d'))){
				$date = date('Y-m-d', strtotime($request->date . ' +1 day'));
			}else{
				$date = date('Y-m-d');
			}
		}
		if($request->submit == 'back'){
			$date = date('Y-m-d', strtotime($request->date . ' -1 day'));
		}
		if($request->submit == 'hd'){
			$date = date('Y-m-d');
		}

		$hd = ($request->hd) ? true : false;

       	try{
       		$client = new \GuzzleHttp\Client();
			$params = [
	            'api_key' => 'm1TjeAgd63S3urgJwVvIJ3djL4tb5bwPyqsEOYKd',
	            'date' => $date,
	            'hd' => $hd
	        ];

       		$response = $client->request('get', "https://api.nasa.gov/planetary/apod", [
	            'query' => $params
	        ]);

	        $data = $response->getBody()->getContents();
       	} catch (\Exception $e){
       		$data = '';
       	}

		return $data;
	}
}