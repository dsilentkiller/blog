   <!-- Sidebar Start -->
   <div class="sidebar pe-4 pb-3">
       <nav class="navbar bg-light navbar-light">
           <a href="index.html" class="navbar-brand mx-4 mb-3">
               <h3 class="text-primary">{{ config('app.name') }}</h3>
           </a>
           <div class="d-flex align-items-center ms-4 mb-4">
               <div class="position-relative">
                   <img class="rounded-circle" src="{{ asset('admin/img/user.jpg') }}" alt=""
                       style="width: 40px; height: 40px;">
                   <div
                       class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                   </div>
               </div>
               <div class="ms-3">
                   <h6 class="mb-0">john doe</h6>
                   <span>Admin</span>
               </div>
           </div>
           <div class="navbar-nav w-100">
               <a href="index.html" class="nav-item nav-link active"><i
                       class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
               {{-- <div class="nav-item dropdown">
                   <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                           class="fa fa-laptop me-2"></i>Banner</a>
                   <div class="dropdown-menu bg-transparent border-0">
                       <a href="button.html" class="dropdown-item">Add Banner</a>
                       <a href="typography.html" class="dropdown-item"> View Banner</a>
                       <a href="element.html" class="dropdown-item">Show Banner</a>
                   </div>
               </div> --}}
               <div class="nav-item dropdown">
                   <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                           class="fa fa-laptop me-2"></i>Banner</a>
                   <div class="dropdown-menu bg-transparent border-0">
                       <a href="{{ route('banner.create') }}" class="dropdown-item">Add Banner</a>
                       <a href="{{ route('banner.index') }}" class="dropdown-item"> View Banner</a>
                       {{-- <a href="{{ route('banner.show') }}" class="dropdown-item">Show Banner</a> --}}
                   </div>
               </div>
               {{-- test --}}
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   <ul class="navbar-nav mr-auto">
                       {{-- <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li> --}}

                       <li class="nav-item dropdown">
                           <a class="nav-link dropdown-toggle btn-outline-success me-4" href="#"
                               id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                               aria-expanded="true">
                               BLOG
                           </a>
                           <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                               <a class="dropdown-item" href="{{ route('blog.index') }}">BLOG List</a>
                               {{-- <a class="dropdown-item" href="#">House</a> --}}
                               {{-- <div class="dropdown-divider"></div> --}}
                               <a class="dropdown-item" href="{{ route('blog.create') }}">ADD About </a>
                           </div>
                       </li>
                       <ul>
               </div>

               {{-- test end --}}
               <div class="nav-item dropdown">
                   <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                           class="fa fa-laptop me-2"></i>Member</a>
                   <div class="dropdown-menu bg-transparent border-0">
                       <a href="{{ route('member.create') }}" class="dropdown-item">Add Member</a>
                       <a href="{{ route('member.index') }}" class="dropdown-item"> View Member</a>
                       {{-- <a href="{{ route('banner.show') }}" class="dropdown-item">Show Banner</a> --}}
                   </div>
               </div>
               <div class="nav-item dropdown">
                   <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                           class="fa fa-laptop me-2"></i>About</a>
                   <div class="dropdown-menu bg-transparent border-0">
                       <a href="button.html" class="dropdown-item">Add About</a>
                       <a href="typography.html" class="dropdown-item"> View About</a>
                       <a href="element.html" class="dropdown-item">Show About</a>
                   </div>
               </div>
               <div class="nav-item dropdown">
                   <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                           class="fa fa-laptop me-2"></i>Blog</a>
                   <div class="dropdown-menu bg-transparent border-0">
                       <a href="{{ route('blog.create') }}" class="dropdown-item">Add Blog</a>
                       <a href="{{ route('blog.index') }}" class="dropdown-item"> View Blog</a>
                       {{-- <a href="{{ route('banner.show') }}" class="dropdown-item">Show Banner</a> --}}
                   </div>
               </div>
               <div class="nav-item dropdown">
                   <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                           class="fa fa-laptop me-2"></i>Todo</a>
                   <div class="dropdown-menu bg-transparent border-0">
                       <a href="{{ route('todo.create') }}" class="dropdown-item">Add Todo</a>
                       <a href="{{ route('todo.index') }}" class="dropdown-item"> View Todo List</a>
                       {{-- <a href="{{ route('banner.show') }}" class="dropdown-item">Show Banner</a> --}}
                   </div>
               </div>
               <a href="form.html" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Contact</a>

           </div>
       </nav>
   </div>
   <!-- Sidebar End -->
