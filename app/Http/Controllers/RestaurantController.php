<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Restaurant::orderBy('created_at', 'DESC')->get();
    }

    public function getById($id) {
        return Restaurant::find($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $newRestaurant = new Restaurant;
		$newRestaurant->name = $request->restaurant["name"];
        $newRestaurant->address = $request->restaurant["address"];
        $newRestaurant->contact = $request->restaurant["contact"];
		$newRestaurant->save();

		return response()->json($newRestaurant);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $existingRestaurant = Restaurant::find($id);

		if ($existingRestaurant) {
			$existingRestaurant->name = $request->restaurant["name"];
            $existingRestaurant->address = $request->restaurant["address"];
            $existingRestaurant->contact = $request->restaurant["contact"];
            $existingRestaurant->save();

			return response()->json("Restaurant has been updated!");
		}

		return response()->json("Restaurant doesn't exist!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $existingRestaurant = Restaurant::find($id);

        if ($existingRestaurant) {
            $existingRestaurant->delete();

            return response()->json("Restaurant deleted");
        }

        return response()->json("Restaurant doesn't exist!");
    }
}
