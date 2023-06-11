@extends('layouts.admin')


<div class="al-confirm d-none">
    <div class="d-flex flex-column">
        <span>Sicuro di voler cancellare questo progetto? Questa azione è <strong class="text-danger">irreversibile</strong></span>
    </div>
    
    <div class="d-flex justify-content-center align-items-center gap-4 pt-4">
        <div onclick="window.Func.removeConfirmElement()" class="al-round al-red">
            <i class="fa-solid fa-xmark"></i>
        </div>
        <div onclick="window.Func.submitFormIndex(window.Var.projectIndex)" class="al-round al-green">
            <i class="fa-solid fa-check"></i>
        </div>
    </div>
</div>


@section('content')

    <h1 class="pb-4">I tuoi progetti</h1>

    <hr>

    <div class="d-flex flex-column align-items-start gap-3 px-4 border-start border-end border-secondary">
        
        
        @for ($i = 0; $i < count($projects); $i++)

        <h3>{{$projects[$i]->name}}</h3>

        <h6>{{$projects[$i]->description}}</h6>

        <div class="d-flex align-items-start gap-3">
            @foreach ($projects[$i]->technologies as $technology)
                <h4 class="badge bg-success">{{$technology->name}}</h4>
            @endforeach
        </div>
        

        <div class="align-self-end d-flex gap-3">
            <i class="fa-solid fa-edit al-icon"></i>
            <i onclick="window.Func.askConfirm(event); window.Var.projectIndex = {{$i + 1}};" class="fa-solid fa-trash al-icon hover-red"></i>
        </div>
        <hr class="w-100">

        <form action="{{route('admin.project.destroy', $projects[$i]->id)}}" method="POST">
            @csrf
            @method("DELETE")
        </form>


    @endfor


    </div>



@endsection
