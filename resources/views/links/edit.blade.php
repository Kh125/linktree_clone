@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 card">
            <div class="card-body">
                <h2 class="card-title">
                    Edit the link
                </h2>
                <form action="/dashboard/links/{{ $link->id }}" method="post">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="name">Link Name</label>
                                <input type="text" id="name" name="name" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}" placeholder="My Youtube channel" value="{{ $link->name }}">
                                @if ($errors->first('name'))
                                    <div class="invalid-feedback">
                                        {{ $errors->first('name') }}
                                    </div>
                                @endif                                
                            </div>
                        </div>
                        <div class="col-12 col-md-6">
                            <div class="form-group">
                                <label for="name">Link URL</label>
                                <input type="text" id="link" name="link" class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}" placeholder="https://youtube.com/user/mychannel" value="{{ $link->link }}">                                
                                @error('link')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            @csrf
                            <button type="submit" class="btn btn-primary">
                                Update Link
                            </button>
                            <button type="button" class="btn btn-secondary" onclick="event.preventDefault(); document.getElementById('delete-form').submit();">
                                Delete Link
                            </button>
                        </div>

                    </div>
                </form>     
                <form action="/dashboard/links/{{ $link->id }}" id="delete-form" method="post">
                    @csrf
                    @method('DELETE')                    
                </form>
            </div>
        </div>
    </div>
</div>    
@endsection