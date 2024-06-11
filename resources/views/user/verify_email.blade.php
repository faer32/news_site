@extends('layouts.main')

@section('content')           
<!-- Контент -->
<div class="container">
    <div class="row mt-1">
        <div class="col-lg-10">
            <!-- Контент на странице -->
            <div class="row">
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-6 bg-white p-4 mb-4 mx-3 rounded custom-shadow">
                            @if (session('message'))
                                <div class="mb-6 flex gap-3 rounded-md border border-yellow-500 bg-yellow-50 <svg class="h-5 w-5 text-yellow-400" xmlns="http://www.w3.org/2000/svg">
                                    <h3 class="text-sm font-medium text-yellow-800">{{ session('message') }}
                                </div>
                            @endif
                            <h2 class="text-center mb-4">Отправка письма на почту</h2>
                            <form action="{{route('verification.send')}}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-dark btn-block">Отправить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection