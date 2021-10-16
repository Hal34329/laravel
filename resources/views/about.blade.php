@extends('layout')

@section('title', __('About'))

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-lg-6">
            <img class="img-fluid mb-4" src="/img/about.svg" alt="Desarrollo Web">
        </div>
        <div class="col-12 col-lg-6">
            <h1 class="display-5 text-primary">{{--@lang('Home')--}}Quienes somos</h1>
            <p class="lead text-secondary font-italic">We, the last unbroken remnants, vow to undo the errors of our ascendants, 
                to make the Earth whole, the lost unlost, at peril of our own birth.</p>
                <a class="btn btn-lg btn-block btn-primary" 
                    href="{{ route('contact')}}"
                    >Contáctanos
                </a>
                <a class="btn btn-lg btn-block btn-outline-primary" 
                    href="{{ route('projects.index')}}"
                    >Portafolio
                </a>
        </div>    
    </div>
</div>
@endsection