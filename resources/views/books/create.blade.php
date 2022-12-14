@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col-md-12 mt-5 mb-5">
            <div class="card">
                <div class="card-header">Naujos knygos sukūrimas</div>
                <div class="card-body">
                    <form action="{{ route('books.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Knygos pavadinimas</label>
                            <input class="form-control" type="text" name="pavadinimas" >

                        </div>

                        <div class="mb-3">
                            <label class="form-label">Knygos santrauka</label>
                            <input class="form-control" type="text" name="santrauka" >

                        </div>
                        <div class="mb-3">
                            <label class="form-label">ISBN</label>
                            <input class="form-control" type="text" name="isbn" >

                        </div>

                        <div class="mb-3">
                            <label class="form-label">Knygos kategorija</label>
                            <select class="form-control" name="category_id" >
                                <option selected>Pasirinkti</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" > {{$category->name}} </option>
                                @endforeach
                            </select>

                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label mx-2">Knygos nuotrauka</label>
                            <input type="file" class="form-control" name="img">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label mx-2">Puslapių skaičius</label>
                            <input type="number" class="form-control" name="puslapiai" >
                        </div>


                        <button class="btn btn-primary">Pridėti knygą</button>
                        <a class="btn btn-success mx-3 float-end" href="{{ route('books.index') }}">Atgal</a>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection



