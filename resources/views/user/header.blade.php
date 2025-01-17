<div class="header">

<!-- FontAwesome Icons -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" />

<style>
    .btn:hover {
        background-color: #ff4b2b !important; /* Red color */
        color: white !important; /* Text color to white */
    }

    .btn-gradient-danger:hover {
        background: linear-gradient(to right, #ff4b2b, #ff416c) !important; /* Gradient effect on hover */
    }

    /* Mobile-friendly tweaks */
    @media (max-width: 576px) {
        .modal-dialog {
            margin: 0;
            padding: 10px;
        }
        .modal-body {
            padding: 15px;
        }
    }
</style>
    <!-- Logo -->
    <div class="header-left">
        <a href="#" class="logo">
            <img src="{{asset('admin/assets/img/profiles/avatar-21.png')}}" width="40" height="40" alt="">
        </a>
    </div>
    <!-- /Logo -->

    <a id="toggle_btn" href="javascript:void(0);">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>

    <!-- Header Title -->
    <div class="page-title-box">
        <h3>CreatesoftLab</h3>
    </div>
    <!-- /Header Title -->

    <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>

    <!-- Header Menu -->
    <ul class="nav user-menu">

        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                <span class="user-img">
                    @if($user->pro_image)
                        <!-- Display user image if exists -->
                        <img src="{{ asset('pro_pic/' . $user->pro_image) }}" alt="User Image" height="30" width="30">
                    @else
                        <!-- Show default "la la user" icon if no image -->
                        <i class="la la-user" style="font-size: 20px; color: #fff; background-color: #4CAF50; border-radius: 50%; width: 40px; height: 40px; display: flex; justify-content: center; align-items: center; transition: all 0.3s ease-in-out;" onmouseover="this.style.backgroundColor='#009688'" onmouseout="this.style.backgroundColor='#4CAF50'"></i>
                    @endif
                </span>
                <span class="status online"></span></span>
                <span>{{ $user->name }}</span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('user.profile') }}">My Profile</a>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logout_">Logout</a>
            </div>
        </li>
    </ul>
    <!-- /Header Menu -->

    <!-- Mobile Menu -->
    <div class="dropdown mobile-user-menu">
        <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-ellipsis-v"></i></a>
        <div class="dropdown-menu dropdown-menu-right">
            <a class="dropdown-item" href="{{ route('user.profile') }}">My Profile</a>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logout_">Logout</a>
        </div>
    </div>
    <!-- /Mobile Menu -->

</div>

<div class="modal custom-modal fade" id="logout_" tabindex="-1" role="dialog" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="border-0 shadow-lg modal-content rounded-3">
            <div class="p-5 modal-body">
                <div class="mb-4 text-center">
                    <h3 class="text-primary font-weight-bold">Confirm Logout</h3>
                    <p class="text-muted font-italic">Are you sure you want to log out?</p>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <div class="d-flex flex-column flex-sm-row justify-content-center">
                        <div class="mb-2 col-12 col-sm-5 mb-sm-0">
                            <button type="submit" class="py-3 shadow-sm btn btn-gradient-danger btn-lg w-100 hover-zoom-in" >
                                <i class="mr-2 fas fa-sign-out-alt"></i><span class="font-weight-bold">Yes, Log me out</span>
                            </button>
                        </div>
                        <div class="col-12 col-sm-5 offset-sm-1">
                            <button type="button" data-dismiss="modal" class="py-3 shadow-sm btn btn-light btn-lg w-100 hover-zoom-in">
                                <i class="mr-2 fas fa-times-circle"></i><span class="font-weight-bold">No, Keep me logged in</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS to change hover effect to red -->





