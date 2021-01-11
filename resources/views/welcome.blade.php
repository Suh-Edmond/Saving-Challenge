@extends("layouts.app")

@section('content')
<div>
    <nav class="navbar p-3 navbar-light bg-light">
        <div class="d-flex col-12 col-md-3 col-lg-2 mb-lg-0 flex-wrap flex-md-nowrap justify-content-between">
            <a class="navbar-brand" href="#">Dashboard</a>
            <button class="navbar-toggler d-md-none collapsed mb-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="col-12 col-md-5 col-lg-8 d-flex mt-3 align-items-center justify-content-md-end mt-md-8">
            <div class="mr-3 mt-1">
                <p class="text-secondary">Admin Panel</p>
            </div>
            <div class="dropdown">
                <button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" id="dropdownMenuButton">User
                </button>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li class="dropdown-item"><a href="#">Settings</a></li>
                    <li class="dropdown-item"><a href="#">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 col-lg2 d-md-block collapse bg-light" id="navbarSupportedContent">
                <div class="position-sticky">
                    <ul class="navbar-nav flex column">
                        <li class="nav-item">
                            <a href="#" class="nav-link active" aria-current="page">Saving Challenges</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-secondary" aria-current="page">My Saving Challenges</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link text-secondary" aria-current="page">Account</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <footer class="pt-5 d-flex justify-content-between">
                <p>Copyright &copy; 2020</p>
            </footer>
        </div>
    </div>
</div>
@endsection