<?php

namespace App\Http\Controllers\Ajax;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
  public function store(ContactRequest $request) {

      // メールを送信する
      return response()->json([
          'result' => true
      ]);

  }
}
