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
                   <h6 class="mb-0">USER</h6>
                   <span>USER PAARU</span>
               </div>
           </div>
           <div class="navbar-nav w-100">
               <a href="index.html" class="nav-item nav-link active"><i
                       class="fa fa-tachometer-alt me-2"></i>Dashboard</a>

               <a href="{{ route('blog.create') }}" class="nav-item nav-link"><i
                       class="fa fa-keyboard me-2"></i>Blog</a>
               <a href="{{ route('todo.create') }}" class="nav-item nav-link"><i class="fa fa-tasks"
                       aria-hidden="true"></i>Todo</a>
               <a href="{{ route('loan.create') }}" class="nav-item nav-link"><i
                       class="fa fa-keyboard me-2"></i>Loan</a>
               <a href="{{ route('investment.create') }}" class="nav-item nav-link"><i
                       class="fa fa-keyboard me-2"></i>Investment</a>
               <a href="{{ route('income.create') }}" class="nav-item nav-link"><i
                       class="fa fa-keyboard me-2"></i>Income</a>
               <a href="{{ route('expense.create') }}" class="nav-item nav-link"><i
                       class="fa fa-keyboard me-2"></i>Expense</a>

               <a href="{{ route('ledger-group.create') }}" class="nav-item nav-link"><i
                       class="fa fa-keyboard me-2"></i>Accounts</a>
               {{-- <a href="{{ route('userrole.index') }}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Manage --}}
               {{-- Roles </a> --}}




           </div>
       </nav>
   </div>
   <!-- Sidebar End -->
