<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UploadFileController extends Controller
{
	public $file;
	public $g_file = 'file.pdf';
	public $path = '\\pdf2txt\\';

	public function index(){
		return view('convert');
  }

 	public function uploadFile(Request $request){
 		$file = $request->file('btnFile');
    	$file->move('pdf2txt', 'file.pdf');
    	//$this->convert();
      return view('import');
 	}

 	public function convert(){
      $output_route = public_path().$this->path;
      dd($output_route);
      $output = `/usr/bin/pdftotext -enc Latin1 -layout {$file} {$output_route}/file.txt`;
  }
}
