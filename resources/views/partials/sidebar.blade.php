<aside class="d-flex flex-column pt-4">



    <a href="{{Route('admin.project.index', Auth::user()->name)}}" class="d-flex align-items-center gap-2 py-3 px-3">
        <i class="fa-solid fa-cubes"></i>
        <span class="d-none d-md-block">Progetti</span>
    </a>


    <hr>
    <hr>

    
    <a href="{{Route('admin.account.index', Auth::user()->name)}}" class="d-flex align-items-center gap-2 py-3 px-3">
        <i class="fa-regular fa-id-card"></i>
        <span class="d-none d-md-block">Account</span>
    </a>

    <a href="{{Route('admin.profile.index', Auth::user()->name)}}" class="d-flex align-items-center gap-2 py-3 px-3 mb-4">
        <i class="fa-solid fa-user"></i>
        <span class="d-none d-md-block">Profilo</span>
    </a>




    <div onclick="window.Func.resizeSidebar();" class="sidebar-resizer">
        <i class="fa-solid fa-chevron-right"></i>
    </div>

</aside>