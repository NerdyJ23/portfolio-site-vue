<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Response;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

	static function sendResponse(mixed $body = null, int $code = 200, $headers = [], $errors = []) {
		// $result = [];
		// if (!is_null($body)) {
		// 	if (is_array($body)) {
		// 		$result = [
		// 			'result' => $body,
		// 			'count' => sizeof($body)
		// 		];
		// 	} else {
		// 		$result = $body;
		// 	}
		// }
		// $result += ['errors' => $errors];

		return new Response(content: $body, status: $code, headers: $headers);
	}

}
