<?php

namespace App\Http\Controllers;
use App\Person;
use Illuminate\Http\Request;

class DietController extends Controller
{
    //
	public function reg(Request $request) 
	{       
		$person = new Person(
			$request->id,
			$request->age,
			$request->sex,
			$request->rost,
			$request->weight,
			$request->lifestyle,
			$request->target
		);
		
		return response()->json([
			'type' => 'ok',
			'calories' => $person->calories
		])->setStatusCode(200,'OK');
	}
	
	public function reg_full(Request $request) 
	{       
		$person = new Person(
			$request->id,
			$request->age,
			$request->sex,
			$request->rost,
			$request->weight,
			$request->lifestyle,
			$request->target
		);
		
		return response()->json([
			'name' => $person->name,
			'calories' => $person->calories,
			'img' => $person->img
		])->setStatusCode(200,'OK');
	}

	public function imt(Request $request) 
	{       
		$person = new Person(
			$request->id,
			$request->age,
			$request->sex,
			$request->rost,
			$request->weight,
			$request->lifestyle,
			$request->target
		);
		
		return response()->json([
			'type' => 'ok',
			'imt' => $person->imt,
			'imt_msg' => $person->imt_msg
		])->setStatusCode(200,'OK');
	}
	public function imt_full(Request $request) 
	{       
		$person = new Person(
			$request->id,
			$request->age,
			$request->sex,
			$request->rost,
			$request->weight,
			$request->lifestyle,
			$request->target
		);
		
		return response()->json([
			'type' => 'ok',
			'imt' => $person->imt,
			'imt_msg' => $person->imt_msg,
			'imt_recommend' => $person->recommend,
			'imt_prod_consume' => $person->products_consume,
			'imt_prod_prohibited' => $person->products_prohibited
		])->setStatusCode(200,'OK');
	}
	
}
