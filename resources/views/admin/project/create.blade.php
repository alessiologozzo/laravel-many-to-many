@extends('layouts.admin')


@section('content')
    <h1>Crea un nuovo progetto</h1>

    <hr>

    <form action="{{ route('admin.project.store') }}" method="POST"
        class="row px-4 pt-4 border-start border-end border-secondary">
        @csrf

        <div class="col-12 col-lg-6 d-flex flex-column gap-3 pb-3 pe-lg-5">

            <div class="w-100 d-flex flex-column gap-1">
                <label for="name" class="text-decoration-underline">Titolo</label>
                <input type="text" name="name" id="name" @if(!$errors->has("name")) value="{{old('name')}}" @endif placeholder="Titolo..." class="form-control @error('name') is-invalid @enderror">

                @if ($errors->has('name'))
                    <strong class="text-danger">
                        {{ $errors->first('name') }}
                    </strong>
                @endif
            </div>


            <div class="w-100 d-flex flex-column gap-1">
                <label for="description" class="text-decoration-underline">Descrizione</label>
                <textarea name="description" id="description" rows="6" placeholder="Descrizione...">{{old("description")}}</textarea>
            </div>

        </div>


        <div class="col-12 col-lg-6 d-flex flex-column align-items-start gap-3 pb-3">

            <span class="text-decoration-underline">Tecnologie</span>
            <div id="technologiesWrapper" class="d-flex flex-wrap gap-3 pb-2 tech-wrapper-p">

                @if ($errors->has("noTechErr"))
                    <strong id="noTechErr" class="text-danger">{{ $errors->first("noTechErr")}} </strong>
                @endif

            </div>

            <div onclick="window.Func.toggleAddTechnologiesWrapper()" class="border al-plus mt-4">
                <i class="fa-solid fa-plus"></i>
            </div>

            <div id="addTechnologiesWrapper" class="d-flex flex-wrap gap-3">
                @foreach ($technologies as $technology)
                    <span onclick="window.Func.addTechnology('{{ $technology->name }}', '{{ $technology->bg_color }}')"
                        class="badge {{ $technology->bg_color }} badge-hover-add">{{ $technology->name }}</span>
                @endforeach
            </div>
        </div>


        <div class="d-lg-flex justify-content-center pt-5 pb-4">
            <input type="submit" class="al-button" value="Crea Progetto">
        </div>


        <input type="text" name="technologiesList" id="technologiesList" class="d-none" value="">
    </form>


    <hr class="pb-3">
@endsection
