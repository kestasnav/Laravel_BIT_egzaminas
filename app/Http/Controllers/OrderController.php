<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\pamegtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all()->where('user_id', Auth::user()->id);
        return view('user.orders',['orders'=>$orders]);
    }

    public function rezervuoti(Order $uzsakymai, Request $request, $add)
    {
        $uzsakymai= new Order();
        $uzsakymai->status=$request->status;
        $uzsakymai->user_id=$request->user_id;
        $uzsakymai->book_id=$request->book_id;
        $uzsakymai->save();
        return redirect()->back();
    }

    public function pamegti(Request $request)
    {
        $uzsakymai= new pamegtos();

        $uzsakymai->user_id=$request->user_id;
        $uzsakymai->book_id=$request->book_id;
        $uzsakymai->save();
        return redirect()->back();
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orders = Order::find($id);
        $orders->delete();
        return redirect()->back()->with('message', "Knyga sėkmingai atšaukta");
    }
}
