@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <div class="card">
                <div class="card-header">Kategorijos redagavimas</div>
                <div class="card-body">
                    <form action="{{ route('categories.update',$category->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Kategorijos pavadinimas</label>
                            <input class="form-control" type="text" name="name" value="{{$category->name}}" >

                        </div>

                        <button class="btn btn-primary">Atnaujinti kategoriją</button>
                        <a class="btn btn-success mx-3 float-end" href="{{ route('categories.index') }}">Atgal</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection



