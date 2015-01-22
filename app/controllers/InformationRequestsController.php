<?php

class InformationRequestsController extends \BaseController {

  protected $informationRequest;

  /**
   * InformationRequest Constructor.
   *
   * @param InformationRequest $informationRequest
   */
  public function __construct(InformationRequest $informationRequest) {
    $this->informationRequest = $informationRequest;
  }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    $informationRequests = $this->informationRequest->all();

    return View::make('informationRequests.index', [
      'informationRequests' => $informationRequests
    ]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
    if(Auth::check()) {
      return View::make('informationRequests.create');
    } else {
      return View::make('users.create');
    }
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
    $informationRequest = new InformationRequest();
    $informationRequest->title = Input::get('title');
    $informationRequest->description = Input::get('description');
    $informationRequest->userId = 1;
    $informationRequest->neighborhoodId = 1;
    $informationRequest->claimWorkCategoryId = 1;
    $informationRequest->save();

    return $this->index();
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
    $informationRequest = $this->informationRequest->whereId($id)->first();
    return View::make('informationRequests.show', ['informationRequest' => $informationRequest]);
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
