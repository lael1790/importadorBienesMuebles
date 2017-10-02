<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\ClavesModel;

class ExtractFromFileController extends Controller
{
	public $content;
	public $tcuenta = array(0 => "CAPITALIZABLES", 1 => "NO CAPITALIZABLES", 2 => "CUENTAS DE ORDEN");

	public function index(){
		return view('import');
  	}

  	public function extract(){
  		$this->fcontent();
  		$this->blank_fcontent();
  		$this->clasif();
  		//dd($this->content);
  	}

  	public function blank_fcontent()
  	{
  		$this->content = str_replace("\f","",$this->content);
  		$this->content = explode("\n", $this->content);

  		for($i = 0; $i < count($this->content); $i++){
  			$this->content[$i] = trim(trim($this->content[$i],"\x00..\x1F\t"));
  		}
  	}

  	public function clasif()
  	{
  		$tipo_cuenta = 1;
  		for($i = 0; $i < count($this->content); $i++){
  			$msg = "";
  			$msg = "<b>Iteration:</b> ".$i."\t";
  			$msg = $msg."<b>Token:</b> ".str_replace(" ","",$this->content[$i])." (".strlen($this->content[$i]).")";

  			if($this->content[$i] != ""){
  				if(is_numeric(substr($this->content[$i], 0, 1)) && strlen($this->content[$i]) > 10){
  					//tokenizar y revisar si hay 3...
  					$msg = $msg."<br>&nbsp;&nbsp;&nbsp;Candidato encontrado"."<br>";
  					$cog = strstr($this->content[$i], ' ', true);
  					$msg = $msg."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>COG</i>=".$cog."<br>";
  					$cveToken = trim(strstr($this->content[$i], ' '));
  					if(substr($cveToken, 0, 2) == "NC" || substr($cveToken, 0, 2) == "C0" || substr($cveToken, 0, 2) == "CU"){
  						$cve = strstr($cveToken, ' ', true);
  						$desc = trim(strstr($cveToken, ' '));
  						$msg = $msg."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>CVE</i>=".$cve."<br>";
  						$msg = $msg."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i>DSC</i>=".$desc."<br>";
  						echo $msg;
  						$claves = new ClavesModel;
  						$claves->cog_id = $cog;
  						$claves->cve_armonizada = $cve;
  						$claves->descrip = $desc;
  						$claves->id_tipo = $tipo_cuenta;
  						$claves->save();
  					}
  				}
  				else{
  					//Establecer tipo de cuenta...
  					if(array_search(trim($this->content[$i]), $this->tcuenta) !== false){
  						$tipo_cuenta = array_search($this->content[$i], $this->tcuenta) + 1;
  						$msg = $msg."<br>&nbsp;&nbsp;&nbsp;Cuenta establecida: ".$tipo_cuenta."<br><br>";
  						echo $msg;
  					}
  				}
  			}
  		}
  	}

  	public function fcontent(){
  		$filename = str_replace('/','\\',public_path().'/pdf2txt/file.txt');
  		$file = fopen($filename, 'r');
  		//$this->content = explode("\n", fread($file, filesize($filename)));
  		$this->content = fread($file, filesize($filename));
  		fclose($file);
  		//var_dump($this->content);
  	}
}
