@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <form action="{{ route('storearticle') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="designation">Designation</label>
                            <input type="text" class="form-control" id="designation" name="designation">
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity">
                        </div>

                        <div class="form-group">
                            <label for="pu">PU</label>
                            <input type="number" class="form-control" id="pu" name="pu">
                        </div>

                        <div class="form-group">
                            <label for="pachat">Pachat</label>
                            <input type="number" class="form-control" id="pachat" name="pachat">
                        </div>

                        <div class="form-group">
                            <label for="expiration">Expiration</label>
                            <input type="date" class="form-control" id="expiration" name="expiration">
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection