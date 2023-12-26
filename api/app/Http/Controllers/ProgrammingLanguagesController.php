<?php

namespace App\Http\Controllers;

use App\Clients\ProgrammingLanguageClient;
use App\Models\ProgrammingLanguage;
use Illuminate\Http\Request;

class ProgrammingLanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public static function get(string $name)
    {
        $item = ProgrammingLanguageClient::search($name);
		if ($item == null) {
			return parent::sendResponse(code: 404);
		}
		return parent::sendResponse(body: $item);
    }
}
