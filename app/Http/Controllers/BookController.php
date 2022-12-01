<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Order;
use App\Models\pamegtos;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $knygos = Book::all();

        return view('books.index',['knygos'=>$knygos]);

    }

    public function userBooks(Request $request) {
        $find=$request->session()->get('find_book',$request->pavadinimas);
        $knygos = Book::findBooks($find)->get();
        $orders = Order::all();
        $pamegtos = pamegtos::all();
        return view('user.books',['pamegtos'=>$pamegtos,'orders'=>$orders,'knygos'=>$knygos, 'find'=>$find]);
    }

    public function findBook(Request $request) {
        $request->session()->put('find_book', $request->pavadinimas);
        return redirect()->route('user.books');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        return view('books.create',['categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book = new Book();
        if($request->file('img')!=null) {
            $foto = $request->file('img');

            $fotoname = $request->id . '_' . rand() . '.' . $foto->extension();
            $foto->storeAs('images',$fotoname);
            $book->img=$fotoname;
        }

        $book->pavadinimas=$request->pavadinimas;
        $book->santrauka=$request->santrauka;

        $book->isbn=$request->isbn;
        $book->category_id=$request->category_id;
        $book->puslapiai=$request->puslapiai;

        $book->save();

        return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('user.show',['book'=>$book]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $categories=Category::all();
        return view('books.update',['book'=>$book,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        if($request->file('img')!=null) {
            $foto = $request->file('img');

            $fotoname = $request->id . '_' . rand() . '.' . $foto->extension();
            $foto->storeAs('images',$fotoname);
            $book->img=$fotoname;
        }

        $book->pavadinimas=$request->pavadinimas;
        $book->santrauka=$request->santrauka;

        $book->isbn=$request->isbn;
        $book->category_id=$request->category_id;
        $book->puslapiai=$request->puslapiai;

        $book->save();

        return redirect()->route('books.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect()->back()->with('message', 'Knyga ištrinta sėkmingai.');
    }

    public function display($name){
        $file=storage_path('app/images/'.$name);
        return response()->file( $file );
    }
}
