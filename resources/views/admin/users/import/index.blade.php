@extends('layouts.backend')

@section('title','Import User')

@section('content')
<div class="content">
<!-- Dynamic Table with Export Buttons -->
    @if(session()->get('message'))
        <div class="alert alert-info alert-dismissable mt-20" role="alert">
            <strong> {{ session()->get('message') }}  </strong> 
        </div>
    @endif
    <div class="block">
        <div class="block-header block-header-default">
            <h3 class="block-title">Import User <small>Teknik Elektro</small></h3>
        </div>
        <div class="block-content block-content-full">
            <form action="{{route('admin.importuserstore')}}" method="post" enctype="multipart/form-data">
                @csrf
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-success">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="mb-10">
                    <a href="{{route('admin.downloaduser')}}" class="btn btn-success">Template Excel</a>
                </div>
                <div class="form-group">
                    <label>File (.xls, .xlsx)</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="example-file-multiple-input-custom" name="file" data-toggle="custom-file-input" multiple>
                        <label class="custom-file-label" for="example-file-multiple-input-custom">Choose files</label>
                        <p class="text-danger">{{ $errors->first('file') }}</p>
                    </div>
                </div>
                <div class="form-group">
                    <button class="btn btn-primary">Import</button>
                    <a href="{{route('admin.users.index')}}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
        </div>
    </div>
<!-- END Dynamic Table with Export Buttons -->
</div>
@endsection
