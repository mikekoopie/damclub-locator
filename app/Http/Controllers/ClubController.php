<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;


class ClubController extends Controller {

	/**
	 * Displays all clubs
     * Fetch all clubs using the Club-model. Return a JSON-response.
	 *
	 * @return Response
	 */
	public function index()
	{
		$clubs = Club::all();

        $result = array(
            'error' => false,
            'clubs' => $clubs->toArray()
        );

        return Response::json($result, 200) ->setCallback(Input::get('callback'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$club = new Club;
        $club->name = Request::get('name');
        $club->address = Request::get('address');
        $club->phone_number = Request::get('phone_number');
        $club->email = Request::get('email');
        $club->zipcode = Request::get('zipcode');
        $club->city = Request::get('city');
        $club->state = Request::get('state');
        $club->latitude = Request::get('latitude');
        $club->longitude = Request::get('longitude');
        $club->user_id = Auth::user()->id;

        if ( $club->save() ) {
            return Response::json(array(
                'error' => false,
                'message' => 'Club is created successfully.',
                200
            )->setCallBack(Input::get('callback'));
        } else {
            return Response::json(array(
                'error' => true,
                'message' => 'Problem creating club.'),
                200
            )->setCallBack(Input::get('callback'));
        }
	}

	/**
	 * Displays a single club
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$club = Club::find($id);

        $result = array(
            'error' => false,
            'clubs' => $club->toArray()
        );

        return Response::json($result, 200) ->setCallback(Input::get('callback'));
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
