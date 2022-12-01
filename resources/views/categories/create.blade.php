@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <div class="card">
                <div class="card-header">Naujos knygos kategorijos sukūrimas</div>
                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Kategorijos pavadinimas</label>
                            <input class="form-control" type="text" name="name" >

                        </div>

                        <button class="btn btn-primary">Pridėti kategoriją</button>
                        <a class="btn btn-success mx-3 float-end" href="{{ route('categories.index') }}">Atgal</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection



