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
                <div class="card-header">Mano pamėgtų knygų sąrašas </div>

                <div class="card-body">

                    <table class="table">
                        <thead>


                        <th>Pavadinimas</th>
                        <th></th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td><a class="link-primary text-decoration-none" href="{{ route('books.show', $order->book->id) }}">{{ $order->book->pavadinimas }}</a></td>

                                <td>

                                        <form action="{{ route('pamegtos.destroy', $order->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-info">Nebemėgti</button>
                                        </form>

                                </td>
                        @endforeach
                            </tr>
                        </tbody>
                    </table>


                </div>
            </div>
        </div>

    </div>
@endsection
