@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('projects.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('projects.update', $project->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" value="{{ $project->name }}" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Introduction:</strong>
                    <textarea class="form-control" style="height:50px" name="introduction"
                        placeholder="Introduction">{{ $project->introduction }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="image" class="form-control" placeholder="{{ $project->image }}"
                        value="{{ $project->image }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Categorie:</strong>
                    {{-- <select name="category_id" id="">
                        @foreach ($categorys as $item)
                        <option value="{!! $item->id !!}">{!! $item->name !!}</option>
                        @endforeach
                    </select> --}}
                    <input type="text" name="categories" class="form-control" placeholder="{{ $project->categories }}"
                        value="{{ $project->categories }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Quantite:</strong>
                    <input type="number" name="quantite" class="form-control" placeholder="{{ $project->quantite }}"
                        value="{{ $project->quantite }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>price:</strong>
                    <input type="number" name="cost" class="form-control" placeholder="{{ $project->cost }}"
                        value="{{ $project->cost }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button onclick="myFunction()" type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>

    </form>
@endsection

<script>
    function myFunction(){
        alert("Product updated successfully");
    }
</script>
