@extends('layouts.admin')

@section('content')

    <div class="pb-5">

        @if (session()->has('mex'))
            <div class="al-mex">
                <i>{{ session()->get('mex') }}</i>
            </div>
        @endif



        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data" class="al-form pt-4">
            @csrf
            @method('PUT')

            <h1 class="text-center pb-3">Il tuo Profilo</h1>

            <div class="al-form-inside">


                <div class="row justify-content-between align-items-center">

                    <div class="col-8">
                        <small class="pb-1 text-decoration-underline">Nome</small>
                        @if ($user['first_name'] == null)
                            <h4 class="al-opacity">Nessun nome inserito</h4>
                        @else
                            <h4>{{ $user['first_name'] }}</h4>
                        @endif

                        @if ($errors->has('first_name'))
                            <strong class="text-danger">
                                {{ $errors->first('first_name') }}
                            </strong>
                        @endif
                    </div>

                    <div class="col-8 d-none">
                        <label for="first_name" class="pb-1"><small
                                class="text-decoration-underline">Nome</small></label>
                        <input type="text" name="first_name" id="first_name" class="d-block"
                            value="{{ $user['first_name'] }}">
                    </div>

                    <div class="col-4 d-flex justify-content-end ps-5">
                        <i onclick="window.Func.edit(event, 0)" class="fa-solid fa-pen-to-square al-icon"></i>
                    </div>
                </div>

                <hr>


                <div class="row justify-content-between align-items-center">

                    <div class="col-8">
                        <small class="pb-1 text-decoration-underline">Cognome</small>
                        @if ($user['last_name'] == null)
                            <h4 class="al-opacity">Nessun cognome inserito</h4>
                        @else
                            <h4>{{ $user['last_name'] }}</h4>
                        @endif

                        @if ($errors->has('last_name'))
                            <strong class="text-danger">
                                {{ $errors->first('last_name') }}
                            </strong>
                        @endif
                    </div>

                    <div class="col-8 d-none">
                        <label for="last_name" class="pb-1"><small
                                class="text-decoration-underline">Cognome</small></label>
                        <input type="text" name="last_name" id="last_name" class="d-block"
                            value="{{ $user['last_name'] }}">
                    </div>

                    <div class="col-4 d-flex justify-content-end ps-5">
                        <i onclick="window.Func.edit(event, 1)" class="fa-solid fa-pen-to-square al-icon"></i>
                    </div>
                </div>

                <hr>


                <div class="row justify-content-between align-items-center">

                    <div class="col-8">
                        <small class="pb-1 text-decoration-underline">Numero di telefono</small>
                        @if ($user['phone_number'] == null)
                            <h4 class="al-opacity">Nessun numero di telefono inserito</h4>
                        @else
                            <h4>{{ $user['phone_number'] }}</h4>
                        @endif

                        @if ($errors->has('phone_number'))
                            <strong class="text-danger">
                                {{ $errors->first('phone_number') }}
                            </strong>
                        @endif
                    </div>

                    <div class="col-8 d-none">
                        <label for="phone_number" class="pb-1"><small
                                class="text-decoration-underline">Numero di telefono</small></label>
                        <input type="text" name="phone_number" id="phone_number" class="d-block"
                            value="{{ $user['phone_number'] }}">
                    </div>

                    <div class="col-4 d-flex justify-content-end ps-5">
                        <i onclick="window.Func.edit(event, 2)" class="fa-solid fa-pen-to-square al-icon"></i>
                    </div>
                </div>

                <hr>


                <div class="row justify-content-between align-items-center">

                    <div class="col-8">
                        <small class="pb-1 text-decoration-underline">Nazionalità</small>
                        @if ($user['nationality'] == null)
                            <h4 class="al-opacity">Nessuna nazionalità inserita</h4>
                        @else
                            <h4>{{ $user['nationality'] }}</h4>
                        @endif

                        @if ($errors->has('nationality'))
                            <strong class="text-danger">
                                {{ $errors->first('nationality') }}
                            </strong>
                        @endif
                    </div>

                    <div class="col-8 d-none">
                        <label for="nationality" class="pb-1"><small
                                class="text-decoration-underline">Nazionalità</small></label>
                        <input type="text" name="nationality" id="nationality" class="d-block"
                            value="{{ $user['nationality'] }}">
                    </div>

                    <div class="col-4 d-flex justify-content-end ps-5">
                        <i onclick="window.Func.edit(event, 3)" class="fa-solid fa-pen-to-square al-icon"></i>
                    </div>
                </div>

                <hr>


                <div class="row justify-content-between align-items-center">

                    <div class="col-8">
                        <small class="pb-1 text-decoration-underline">Paese</small>
                        @if ($user['country'] == null)
                            <h4 class="al-opacity">Nessun paese inserito</h4>
                        @else
                            <h4>{{ $user['country'] }}</h4>
                        @endif

                        @if ($errors->has('country'))
                            <strong class="text-danger">
                                {{ $errors->first('country') }}
                            </strong>
                        @endif
                    </div>

                    <div class="col-8 d-none">
                        <label for="country" class="pb-1"><small
                                class="text-decoration-underline">Paese</small></label>
                        <input type="text" name="country" id="country" class="d-block" value="{{ $user['country'] }}">
                    </div>

                    <div class="col-4 d-flex justify-content-end ps-5">
                        <i onclick="window.Func.edit(event, 4)" class="fa-solid fa-pen-to-square al-icon"></i>
                    </div>
                </div>

                <hr>


                <div class="row justify-content-between align-items-center">

                    <div class="col-8">
                        <small class="pb-1 text-decoration-underline">Città</small>
                        @if ($user['city'] == null)
                            <h4 class="al-opacity">Nessuna città inserita</h4>
                        @else
                            <h4>{{ $user['city'] }}</h4>
                        @endif

                        @if ($errors->has('city'))
                            <strong class="text-danger">
                                {{ $errors->first('city') }}
                            </strong>
                        @endif
                    </div>

                    <div class="col-8 d-none">
                        <label for="city" class="pb-1"><small
                                class="text-decoration-underline">Città</small></label>
                        <input type="text" name="city" id="city" class="d-block"
                            value="{{ $user['city'] }}">
                    </div>

                    <div class="col-4 d-flex justify-content-end ps-5">
                        <i onclick="window.Func.edit(event, 5)" class="fa-solid fa-pen-to-square al-icon"></i>
                    </div>
                </div>

                <hr>


                <div class="row justify-content-between align-items-center">

                    <div class="col-8">
                        <small class="pb-1 text-decoration-underline">Indirizzo</small>
                        @if ($user['address'] == null)
                            <h4 class="al-opacity">Nessun indirizzo inserito</h4>
                        @else
                            <h4>{{ $user['address'] }}</h4>
                        @endif

                        @if ($errors->has('address'))
                            <strong class="text-danger">
                                {{ $errors->first('address') }}
                            </strong>
                        @endif
                    </div>

                    <div class="col-8 d-none">
                        <label for="address" class="pb-1"><small
                                class="text-decoration-underline">Indirizzo</small></label>
                        <input type="text" name="address" id="address" class="d-block"
                            value="{{ $user['address'] }}">
                    </div>

                    <div class="col-4 d-flex justify-content-end ps-5">
                        <i onclick="window.Func.edit(event, 6)" class="fa-solid fa-pen-to-square al-icon"></i>
                    </div>
                </div>

                <hr>


                <div class="row justify-content-between align-items-center">

                    <small class="pb-3 text-decoration-underline">Immagine del profilo</small>

                    <div class="col-12 d-flex justify-content-center">

                        @if (Auth::user()->profile_image != null)
                            <img src="{{ asset('storage/' . Auth::user()->profile_image) }}" alt="err"
                                class="al-profile-image">
                        @else
                            <h4 class="al-opacity">Nessuna immagine del profilo inserita</h4>
                        @endif
                    </div>

                    <input type="file" name="profile_image" id="profile_image" class="d-block mt-5">
                </div>


                <div class="d-flex justify-content-center pt-5">
                    <input type="submit" class="al-button" value="Modifica il tuo profilo">
                </div>

            </div>

        </form>

    </div>
@endsection
