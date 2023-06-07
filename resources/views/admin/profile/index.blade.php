@extends('layouts.app')

@section('content')
    <div class="al-admin">

        @include('layouts.partials.aside')

        <div class="al-admin-main pb-5">


            <h2 class="text-center">Il tuo profilo - {{ $user['name'] }}</h2>

            <form action="{{ route('admin.profile.update', $user['name']) }}" method="POST" enctype="multipart/form-data"
                class="row pt-4">
                @csrf
                @method('PUT')

                <div class="col-12 col-md-6 pb-4">
                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <span class="pb-1">Nome utente</span>
                            <h5>{{ $user['name'] }}</h5>
                        </div>

                        <div class="d-none">
                            <label for="name" class="pb-1">Nome utente</label>
                            <input type="text" name="name" id="name" class="d-block" value="{{ $user['name'] }}">
                        </div>

                        <div onclick="window.alFunc.edit(event, 0)" class="ps-5">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </div>
                    </div>

                    @if ($errors->has('name'))
                        <div class="text-danger">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                </div>

                <div class="col-12 col-md-6 pb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="pb-1">E-Mail</span>
                            <h5>{{ $user['email'] }}</h5>
                        </div>

                        <div class="d-none">
                            <label for="email" class="pb-1">E-Mail</label>
                            <input type="text" name="email" id="email" class="d-block"
                                value="{{ $user['email'] }}">
                        </div>

                        <div onclick="window.alFunc.edit(event, 1)" class="ps-5">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </div>
                    </div>

                    @if ($errors->has('email'))
                        <div class="text-danger">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>

                <div class="col-12 col-md-6 pb-4">
                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <span class="pb-1">Immagine del Profilo</span>
                            @if ($user['profile_image'] == null)
                                <h5>Nessuna immagine del profilo</h5>
                            @else
                                <h5>{{ $user['profile_image'] }}</h5>
                            @endif

                        </div>

                        <div class="d-none">
                            <label for="profile_image" class="pb-1">Immagine del Profilo</label>
                            <input type="file" name="profile_image" id="profile_image" class="d-block">
                        </div>

                        <div onclick="window.alFunc.edit(event, null)" class="ps-5">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </div>
                    </div>

                    @if ($errors->has('profile_image'))
                        <div class="text-danger">
                            {{ $errors->first('profile_image') }}
                        </div>
                    @endif
                </div>

                <div class="col-12 col-md-6 pb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="pb-1">Nome</span>
                            @if ($user['first_name'] == null)
                                <h5>Nessun nome inserito</h5>
                            @else
                                <h5>{{ $user['first_name'] }}</h5>
                            @endif
                        </div>

                        <div class="d-none">
                            <label for="first_name" class="pb-1">Nome</label>
                            <input type="text" name="first_name" id="first_name" class="d-block"
                                value="{{ $user['first_name'] }}">
                        </div>

                        <div onclick="window.alFunc.edit(event, 2)" class="ps-5">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </div>
                    </div>

                    @if ($errors->has('first_name'))
                        <div class="text-danger">
                            {{ $errors->first('first_name') }}
                        </div>
                    @endif
                </div>

                <div class="col-12 col-md-6 pb-4">
                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <span class="pb-1">Cognome</span>
                            @if ($user['last_name'] == null)
                                <h5>Nessun cognome inserito</h5>
                            @else
                                <h5>{{ $user['last_name'] }}</h5>
                            @endif

                        </div>

                        <div class="d-none">
                            <label for="last_name" class="pb-1">Cognome</label>
                            <input type="text" name="last_name" id="last_name" value="{{ $user['last_name'] }}"
                                class="d-block">
                        </div>

                        <div onclick="window.alFunc.edit(event, 3)" class="ps-5">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </div>
                    </div>

                    @if ($errors->has('last_name'))
                        <div class="text-danger">
                            {{ $errors->first('last_name') }}
                        </div>
                    @endif
                </div>

                <div class="col-12 col-md-6 pb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="pb-1">Numero di telefono</span>
                            @if ($user['first_name'] == null)
                                <h5>Nessun numero di telefono inserito</h5>
                            @else
                                <h5>{{ $user['phone_number'] }}</h5>
                            @endif
                        </div>

                        <div class="d-none">
                            <label for="phone_number" class="pb-1">Numero di telefono</label>
                            <input type="text" name="phone_number" id="phone_number" class="d-block"
                                value="{{ $user['phone_number'] }}">
                        </div>

                        <div onclick="window.alFunc.edit(event, 4)" class="ps-5">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </div>
                    </div>

                    @if ($errors->has('phone_number'))
                        <div class="text-danger">
                            {{ $errors->first('phone_number') }}
                        </div>
                    @endif
                </div>


                <div class="col-12 col-md-6 pb-4">
                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <span class="pb-1">Paese</span>
                            @if ($user['country'] == null)
                                <h5>Nessun paese inserito</h5>
                            @else
                                <h5>{{ $user['country'] }}</h5>
                            @endif

                        </div>

                        <div class="d-none">
                            <label for="country" class="pb-1">Paese</label>
                            <input type="text" name="country" id="country" value="{{ $user['country'] }}"
                                class="d-block">
                        </div>

                        <div onclick="window.alFunc.edit(event, 5)" class="ps-5">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </div>
                    </div>

                    @if ($errors->has('country'))
                        <div class="text-danger">
                            {{ $errors->first('country') }}
                        </div>
                    @endif
                </div>

                <div class="col-12 col-md-6 pb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="pb-1">Nazionalità</span>
                            @if ($user['nationality'] == null)
                                <h5>Nessuna nazionalità inserita</h5>
                            @else
                                <h5>{{ $user['nationality'] }}</h5>
                            @endif
                        </div>

                        <div class="d-none">
                            <label for="nationality" class="pb-1">Nazionalità</label>
                            <input type="text" name="nationality" id="nationality" class="d-block"
                                value="{{ $user['nationality'] }}">
                        </div>

                        <div onclick="window.alFunc.edit(event, 6)" class="ps-5">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </div>
                    </div>

                    @if ($errors->has('nationality'))
                        <div class="text-danger">
                            {{ $errors->first('nationality') }}
                        </div>
                    @endif
                </div>


                <div class="col-12 col-md-6 pb-4">
                    <div class="d-flex justify-content-between align-items-center">

                        <div>
                            <span class="pb-1">Città</span>
                            @if ($user['city'] == null)
                                <h5>Nessuna città inserita</h5>
                            @else
                                <h5>{{ $user['city'] }}</h5>
                            @endif

                        </div>

                        <div class="d-none">
                            <label for="city" class="pb-1">Città</label>
                            <input type="text" name="city" id="city" value="{{ $user['city'] }}"
                                class="d-block">
                        </div>

                        <div onclick="window.alFunc.edit(event, 7)" class="ps-5">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </div>
                    </div>

                    @if ($errors->has('city'))
                        <div class="text-danger">
                            {{ $errors->first('city') }}
                        </div>
                    @endif
                </div>

                <div class="col-12 col-md-6 pb-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <span class="pb-1">Indirizzo</span>
                            @if ($user['address'] == null)
                                <h5>Nessun indirizzo inserito</h5>
                            @else
                                <h5>{{ $user['address'] }}</h5>
                            @endif
                        </div>

                        <div class="d-none">
                            <label for="address" class="pb-1">Indirizzo</label>
                            <input type="text" name="address" id="address" class="d-block"
                                value="{{ $user['address'] }}">
                        </div>

                        <div onclick="window.alFunc.edit(event, 8)" class="ps-5">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </div>
                    </div>

                    @if ($errors->has('address'))
                        <div class="text-danger">
                            {{ $errors->first('address') }}
                        </div>
                    @endif
                </div>
                
                <div class="d-flex justify-content-center pt-5">
                    <input type="submit" class="al-button" value="Invia">
                </div>
            </form>



        </div>
    </div>
@endsection
