<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller {

	public function index(Request $request) {
		//ee($this->viewData);
		return redirect('admin');
		return $this->view('IndexController/index');
	}
}
