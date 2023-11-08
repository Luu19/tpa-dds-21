<?php

namespace App\Http\Controllers;

use App\Models\Repositories\ExampleRepository;
use Illuminate\Http\Request;

class ExampleController
{
    private $exampleRepo;

    public function __construct(ExampleRepository $exampleRepository)
    {
        $this->exampleRepo = $exampleRepository;
    }

    public function customWelcome(Request $request)
    {
        return view('welcome');
    }
}
