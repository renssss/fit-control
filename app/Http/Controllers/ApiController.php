<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests\ApiRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


/**
 *
 * @OA\Info(title="Oetker code API challenge", version="1.0.0")
 * @OA\Server(url="localhost:8000/api/v1")
 *
 * This class should be parent class for other API controllers
 * Class ApiController
 * @package App\Http\Controllers\Api\V1
 */
class ApiController extends Controller
{
	/**
	 * @var Model
	 */
	protected $model;

	/**
	 * @param int $entityId
	 * @return mixed
	 *
	 */
	public function delete(int $entityId) {

		$entity = $this->model->find($entityId);

		if (!$entity) {
			return $this->sendError(' Not found', 404);
		}

		$entity->delete();

		return $this->sendResponse(null, 'Deleted',204);
	}

	/**
	 * @param Request $request
	 * @return mixed
	 */
	public function get(Request $request) {

		$limit = (int) $request->get('limit', 100);
		$offset = (int) $request->get('offset', 0);

		$result =  $this->model->offset($offset)->limit($limit)->get();

		return $this->sendResponse($result, 'OK',200);
	}

	/**
	 * @param int $entityId
	 * @return mixed
	 */
	public function detail(int $entityId) {

		$entity = $this->model->find($entityId);

		if (!$entity) {
			return $this->sendError('Not Found', 404);
		}

		return $this->sendResponse($entity, 'OK', 200);
	}

	/**
	 * @param ApiRequest $request
	 * @return mixed
	 */
	protected function add(ApiRequest $request) {

		$data = $request->validated();
		$this->model->fill($data)->push();

		return $this->sendResponse(null, 'Created', 201);
	}
}