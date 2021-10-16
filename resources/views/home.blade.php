@extends('layout')

@section('title', 'Home')
    <!Home envía espacios en blanco, si es solo una cadena se puede enviar como segundo parámetro y se evita cerrar la sección>
<!endsection>

@section('content')
<div class="container">
    <div class="row">
        
        <div class="col-12 col-lg-6">
            <h1 class="display-5 text-primary">{{--@lang('Home')--}}Desarrollo Web</h1>
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
            <div class="col-12 col-lg-6">
                <img class="img-fluid mb-4" src="/img/home.svg" alt="Desarrollo Web">
            </div>
    </div>
</div>
    
    {{--@auth
        {{ Auth::user()->name }}
    @endauth--}}
    
@endsection