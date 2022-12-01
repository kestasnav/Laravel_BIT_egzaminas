@extends('layouts.admin')
@section('content')


    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <div class="card">
                <div class="card-header"> Knygų kategorijų sąrašas </div>


                <div class="card-body">

                    <a class="btn btn-primary float-end " href="{{ route('bookscategories.create') }}"><i class="fa-solid fa-marker"></i> Pridėti knygos kategoriją</a>

                    <table class="table">
                        <thead>

                        <th>Kategorijos pavadinimas</th>

                        <th></th>
                        <th></th>
                        <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>

                            @foreach($bookscats as $bookscat)

                                <td> {{ $bookscat->category_name }}  </td>
                        </tr>


                        @endforeach

                        </tbody>
                    </table>


                </div>
            </div>
        </div>

    </div>
@endsection
