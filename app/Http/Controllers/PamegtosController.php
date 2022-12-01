<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\pamegtos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PamegtosController extends Controller
{
    public function index()
    {
        $orders = pamegtos::all()->where('user_id', Auth::user()->id);
        return view('user.pamegtos',['orders'=>$orders]);
    }

    public function destroy($id)
    {
        $orders = pamegtos::find($id);
        $orders->delete();
        return redirect()->back()->with('message', "Knyga atmėgta sėkmingai");
    }
}
