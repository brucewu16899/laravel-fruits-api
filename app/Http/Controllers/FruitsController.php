<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Fruit;
use App\Transformers\FruitsTransformer;
use App\Http\Requests\StoreFruitRequest;

class FruitsController extends BaseController
{
	public function index()
	{
		$fruits = Fruit::all();
		
		return $this->collection($fruits, new FruitsTransformer);
	}

	public function show($id)
	{
		$fruit = Fruit::where('id', $id)->first();

		if($fruit){
			return $this->item($fruit, new FruitsTransformer);
		}
		
		return $this->response->errorNotFound();
	}

	public function store(Requests\StoreFruitRequest $request)
	{
		if (Fruit::create($request->all())) {
			return $this->response->created();
		}

		return $this->response->errorBadRequest();
	}

	public function destroy($id)
	{
		$fruit = Fruit::find($id);

		if($fruit){
			$fruit->delete();
			return $this->response->noContent();
		}

		return $this->response->errorBadRequest();
	}
}
