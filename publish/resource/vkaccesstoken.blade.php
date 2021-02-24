@extends('layouts.app')

@section('breadcrumbs')
<div class="row">
    <div class="col-12">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Домой</a></li>
                <li class="breadcrumb-item active" aria-current="page">Войти в vk.com</li>
            </ol>
        </nav>
    </div>
</div>
@endsection

@section('content')
<div class="row section">
    <div class="col-xl-8 col-md-10 mx-auto">
        <div class="card">
            <div class="card-header"><h6 class="card-title mb-0">OAuth vk.com</h6></div>
            <div class="card-body">
                <p><a class="noajax" href="{{ $auth->getUrl() }}">Войти через vk.com</a></p>
                <p><strong>Access Token:</strong> {{ $access_token }}</p>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-7">

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
