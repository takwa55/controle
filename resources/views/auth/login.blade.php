@extends('layouts.master2')
@section('title')
Se Connecter
@stop

@section('css')
<style>
    *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'poppins',sans-serif;
    }
    html,body{
        display: grid;
        height: 100%;
        place-items: center;
        background: #d0edfa;
    }
    .signup-form{ 
        margin-top: 50%;       
        width: 340px;
        background: #fff;
        border-radius: 5px;
        padding: 20px;
    }
    .signup-form form{ 
        padding: 5px 5px 5px 5px;
        height: 100%;
        margin-bottom: 15px;
    } 
    .form-group{ 
        position: relative;
    } 
    .form-group input{
        height: 100%;
        width: 100%;
        text-align: center;
        padding: 10px;
        outline: none;
        border: 1px solid lightgrey;
    }
    .input-group i{
       background-color: rgb(50, 115, 201);
       font-size: 20px;
       width: 40px;
       height: 100%;
       align-items: center;
       margin-right: 88%;
       position: absolute;       
       display: flex;
       border: 1px solid #16a085;
       color: #fff;  
       border-radius: 5px 0 0 5px;
       justify-content: center;
    }
    .signup-form form .btn{
        border-radius: 5px;
    }
    .signup-form form .btn:hover{
        background-color: rgb(81, 173, 78);
    }
   
</style>
@endsection
@section('content')
    <div class="signup-form">
        <div class="text-center"> <a href="{{ url('/' . $page='Home') }}"><img src="{{URL::asset('assets/img/brand/téléchargé.png')}}" alt="logo"></a></div><br>
        <h5 class="text-center">Se Connecter</h5>
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group"> 
                    <div class="input-group">  
                        <span class="input-group-addon"><i class="fa fa-paper-plane"></i></span>
                        <input id="email" type="text" placeholder="Email" @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                    </div>
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>
            <div class="form-group">
                <div class="input-group">  
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input id="password" type="password"placeholder="Mot de passe"  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                </div>
                @error('password')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <br>
            <div class="row">
                <div class="col-md-6 offset-md-4">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <label class="form-check-label" for="remember">
                            {{ __('Enregistrez') }}
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <button type="submit" class="btn btn-main-primary btn-block">
                {{ __('Se Connecter') }}
            </button>
        </form>
    </div>
@endsection
@section('js')
@endsection