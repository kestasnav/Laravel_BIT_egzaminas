@extends('layouts.admin')
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

                        <a class="btn btn-primary float-end " href="{{ route('books.create') }}"><i class="fa-solid fa-marker"></i> Pridėti knygą</a>

                    <table class="table">
                        <thead>

                            <th>Knygos pavadinimas</th>
{{--                            <th>Knygos santrauka</th>--}}
{{--                            <th>ISBN</th>--}}
{{--                            <th>Nuotrauka</th>--}}
{{--                            <th>Puslapių skaičius</th>--}}
{{--                            <th>Kategorija</th>--}}

                            <th colspan="2">Veiksmai</th>


                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            @foreach($knygos as $book)

                                <td> {{ $book->pavadinimas }}  </td>
{{--                                <td> {{ $book->santrauka }}  </td>--}}
{{--                                <td> {{ $book->isbn }}  </td>--}}
{{--                                <td> <img src="{{ route('images',$book->img)}}" style=" width: 200px; height: 120px;"> </td>--}}
{{--                                <td> {{ $book->puslapiai }}  </td>--}}
{{--                                <td> {{ $book->category->name }}  </td>--}}
                                <td><a class="btn btn-success" href="{{ route('books.edit', $book->id) }}"><i class="fa-solid fa-pencil"></i></a></td>
                                <td>
                                        <form action="{{ route('books.destroy', $book->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
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
