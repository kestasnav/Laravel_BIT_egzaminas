@extends('layouts.app')
@section('content')

    <div class="d-flex flex-wrap mt-5 ">

    </div>
    <div class="row mt-1 mb-5">




        <div class="col-md-12">

            <div class="card mt-1 mb-1 position-relative">

                <div class="mx-3 mt-1 mb-1 text-center"><b><h1>{{ $book->pavadinimas}}</h1></b></div>

                <div class="mx-auto">
                    <img class="img-fluid" src="{{ route('images',$book->img)}}" style=" width: 500px; height: 350px;">

                </div>
                <div class="mx-3 mt-3"><p>Trumpas knygos aprašas: <b>{!! $book->santrauka  !!}</b> </p></div>
                <div class="mx-3 mt-3"><p>ISBN: <b> {!! $book->isbn  !!} </b></p></div>
                <div class="mx-3 mt-3"><p>Šioje knygoje yra: <b>{!! $book->puslapiai  !!}</b> puslapių(-iai)</p></div>
                <div class="mx-3 mt-3"><p>Knygos žanras: <b>{!! $book->category->name  !!} </b></p></div>


            </div>
            <div class="row">
                <div class="col-md-6">


            </div>
        </div>




    </div>

@endsection

