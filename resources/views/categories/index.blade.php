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
                <div class="card-header"> Knygų kategorijų sąrašas </div>


                <div class="card-body">

                    <a class="btn btn-primary float-end " href="{{ route('categories.create') }}"><i class="fa-solid fa-marker"></i> Pridėti knygos kategoriją</a>

                    <table class="table">
                        <thead>

                        <th>Kategorijos pavadinimas</th>

                        <th colspan="2">Veiksmai</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            @foreach($categories as $bookscat)

                                <td> {{ $bookscat->name }}  </td>
                                <td><a class="btn btn-success" href="{{ route('categories.edit', $bookscat->id) }}"><i class="fa-solid fa-pencil"></i></a></td>

                                <td>
                                    <form action="{{ route('categories.destroy', $bookscat->id) }}" method="post">
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
