@extends('layouts.app')
@section('content')

    @if(session()->has('message'))
        <div class="alert alert-danger mt-3">
            <button type="button" class="btn-close float-end" data-bs-dismiss="alert" aria-label="Close"></button>
            {{session()->get('message')}}
        </div>
    @endif
    <div class="row">

        <div class="col-md-12 mt-5 mb-5">
            <div class="card">
                <div class="card-header"> Knygų sąrašas </div>

                <div class="card-body">

                    <table class="table">
                        <thead>

{{--                        <th>Nuotrauka</th>--}}
                        <th>Pavadinimas</th>
                        <th></th>
{{--                        <th>Knygos santrauka</th>--}}
{{--                        <th>ISBN</th>--}}
{{--                        <th>Puslapių skaičius</th>--}}
{{--                        <th>Kategorija</th>--}}

                        <th></th>


                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            @foreach($knygos as $book)

{{--                                <td> <img class="img-fluid" src="{{ route('images',$book->img)}}" style=" width: 200px; height: 180px;"> </td>--}}
                                <td> {{ $book->pavadinimas }}  </td>
                                <td><a class="link-primary" href="{{ route('books.show', $book->id) }}">Detaliau apie knygą..</a></td>

                                {{--                                <td> {{ $book->santrauka }}  </td>--}}
{{--                                <td> {{ $book->isbn }}  </td>--}}
{{--                                <td> {{ $book->puslapiai }}  </td>--}}
{{--                                <td> {{ $book->category->name }}  </td>--}}

                                    <td>
                                        @if ($orders->where('book_id',$book->id)->isEmpty() )
                                            <form action="{{ route('rezervuoti', $book->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="status" value="rezervuotas">
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <input type="hidden" name="book_id" value="{{$book->id}}">
                                            <button class="btn btn-info">Rezervuoti </button>
                                            </form>
                                        @else
                                            Knyga jau užrezervuota
                                        @endif
                                    </td>
                                <td>
                                    @if ($pamegtos->where('book_id',$book->id)->where('user_id', Auth::user()->id)->isEmpty() )
                                        <form action="{{ route('pamegti', $book->id) }}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                            <input type="hidden" name="book_id" value="{{$book->id}}">
                                            <button class="btn btn-danger"><i class="fa fa-heart" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    @else
                                        Jūs jau pamėgote šią knygą
                                    @endif

                                    </form>

                                </td>
                        </tr>


                        @endforeach

                        </tbody>
                    </table>


                </div>
            </div>
        </div>

    </div>
@endsection
