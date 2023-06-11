@extends('layouts.admin')

@section('content')

<div class="pb-5 position-relative">

    @if (session()->has('mex'))
        <div class="al-mex">
            <i>{{ session()->get('mex') }}</i>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="al-mex bg-danger">
            <i>{{ session()->get('error') }}</i>
        </div>
    @endif

    @if (session()->has('errorDelete'))
        <div class="al-mex bg-danger">
            <i>{{ session()->get('errorDelete') }}</i>
        </div>
    @endif


    <div class="al-confirm d-none">
        <div class="d-flex flex-column">
            <span>Sicuro di voler cancellare il tuo account? Questa azione è <strong class="text-danger">irreversibile</strong></span>
            <label for="password" class="pt-3 pb-1">Inserisci la tua password per proseguire</label>

            <form action="{{Route('admin.account.destroy')}}" method="POST">
                @csrf
                @method('DELETE')

                <input type="password" name="password" id="password" placeholder="Password...">
            </form>
        </div>
        
        <div class="d-flex justify-content-center align-items-center gap-4 pt-4">
            <div onclick="window.Func.removeConfirmElement()" class="al-round al-red">
                <i class="fa-solid fa-xmark"></i>
            </div>
            <div onclick="window.Func.submitForm(event)" class="al-round al-green">
                <i class="fa-solid fa-check"></i>

            </div>
        </div>
    </div>


    <form action="{{ route('admin.account.update') }}" method="POST" class="al-form pt-4">
        @csrf
        @method('PUT')

        <h1 class="text-center pb-3">Il tuo Account</h1>

        <div class="al-form-inside">


            <div class="row justify-content-between align-items-center">

                <div class="col-8">
                    <small class="pb-1 text-decoration-underline">Nome utente</small>
                    <h4>{{ $user['name'] }}</h4>

                    @if ($errors->has('name'))
                        <strong class="text-danger">
                            {{ $errors->first('name') }}
                        </strong>
                    @endif
                </div>

                <div class="col-8 d-none">
                    <label for="name" class="pb-1"><small
                            class="text-decoration-underline">Nome utente</small></label>
                    <input type="text" name="name" id="name" class="d-block" value="{{ $user['name'] }}">
                </div>

                <div class="col-4 d-flex justify-content-end ps-5">
                    <i onclick="window.Func.edit(event, 0)" class="fa-solid fa-pen-to-square al-icon"></i>
                </div>
            </div>

            <hr>


            <div class="row justify-content-between align-items-center">

                <div class="col-8">
                    <small class="pb-1 text-decoration-underline">E-Mail</small>
                    <h4>{{ $user['email'] }}</h4>

                    @if ($errors->has('email'))
                        <strong class="text-danger">
                            {{ $errors->first('email') }}
                        </strong>
                    @endif
                </div>

                <div class="col-8 d-none">
                    <label for="email" class="pb-1"><small
                            class="text-decoration-underline">E-Mail</small></label>
                    <input type="email" name="email" id="email" class="d-block"
                        value="{{ $user['email'] }}">
                </div>

                <div class="col-4 d-flex justify-content-end ps-5">
                    <i onclick="window.Func.edit(event, 1)" class="fa-solid fa-pen-to-square al-icon"></i>
                </div>
            </div>



            <hr>



            <div class="row justify-content-between align-items-center">

                <div class="col-8">
                    <small class="pb-1 text-decoration-underline">Password</small>
                    <span class="d-flex align-items-center gap-3 text-success pt-2">
                        <i class="fa-solid fa-lock fs-4"></i>
                        <h4 style="margin-bottom: 0">Protetta</h4>
                    </span>

                    @if ($errors->has('password'))
                        <strong class="text-danger">
                            {{ $errors->first('password') }}
                        </strong>
                    @endif
                </div>

                <div class="col-8 d-none">
                    <label for="password" class="pb-1">
                        <small class="text-decoration-underline">Password</small>
                    </label>
                    <input type="password" name="new_password" id="password" class="d-block"
                        value="{{ $user['password'] }}">
                </div>

                <div class="col-4 d-flex justify-content-end ps-5">
                    <i onclick="window.Func.edit(event, 2)" class="fa-solid fa-pen-to-square al-icon"></i>
                </div>
            </div>


            <hr class="text-warning">
            <hr class="text-warning">
            <hr class="text-warning">


            <div class="col-12">

                <div class="d-flex align-items-center gap-3">
                    <i class="fa-solid fa-circle-exclamation al-icon-big text-warning"></i>
                    <i>Inserisci la tua password per modificare i dati del tuo account</i>
                </div>


                <div class="pt-3">
                    <input type="password" name="password" placeholder="Password..." value="">
                </div>

                @if (session()->has('error'))
                    <strong class="text-danger">{{ session()->get('error') }}</strong>
                @endif
            </div>


            <div class="d-flex justify-content-center pt-5 pb-5">
                <input type="submit" class="al-button" value="Modifica il tuo Account">
            </div>

        </div>
    </form>


    <strong onclick="window.Func.askConfirm(event)" class="text-danger cursor-pointer">
        <small class="text-decoration-underline">Elimina il tuo account</small>
    </strong>

</div>

@endsection
