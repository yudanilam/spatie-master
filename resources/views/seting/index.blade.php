@extends('layouts.backend')
@section('title','Halaman Setting Management')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Setting Management
                </div>
                <div class="float-end">
                    <a href="{{ route('home') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('edit', $data->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('nama_aplikasi') is-invalid @enderror" id="nama_aplikasi" name="nama_aplikasi" value="{{ $data->nama_aplikasi }}">
                            @if ($errors->has('nama_aplikasi'))
                                <span class="text-danger">{{ $errors->first('nama_aplikasi') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="judul" class="col-md-4 col-form-label text-md-end text-start">Judul</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ $data->judul }}">
                            @if ($errors->has('judul'))
                                <span class="text-danger">{{ $errors->first('judul') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="footer" class="col-md-4 col-form-label text-md-end text-start">Footer</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('footer') is-invalid @enderror" id="footer" name="footer" value="{{ $data->footer }}">
                            @if ($errors->has('footer'))
                                <span class="text-danger">{{ $errors->first('footer') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="version" class="col-md-4 col-form-label text-md-end text-start">Versi</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('version') is-invalid @enderror" id="version" name="version" value="{{ $data->version }}">
                            @if ($errors->has('version'))
                                <span class="text-danger">{{ $errors->first('version') }}</span>
                            @endif
                        </div>
                    </div>

                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update Aplikasi">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
</div>    
@endsection