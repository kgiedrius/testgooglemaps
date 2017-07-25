<?php

namespace App\Http\Controllers;

use App\Services\FileProcessor;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function processApiCall(Request $request, FileProcessor $fileProcessor)
    {
        if (isset($_FILES['uploadFile'])) {
            $file = $_FILES['uploadFile'];
            $data = false;

            switch ($file['type']) {
                case 'text/csv':
                    $data = $fileProcessor->parseCSV($file['tmp_name']);
                    break;
                case 'application/json':
                    $data = $fileProcessor->parseJson($file['tmp_name']);
                    break;
            }

            return $data;
        }
        return false;
    }
}
