<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests, ValidatesRequests;

    public $returnUrl;
    public $fileRepo;

    public function prepare($request, $fiilables)
    {
        $data = array();

        foreach ($fiilables as $fiilable) {
            if ($request->has($fiilable)) {
                $data[$fiilable] = $request->get($fiilable);
            }
        }

        return $data;
    }
}
