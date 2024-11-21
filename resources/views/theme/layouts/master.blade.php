<!DOCTYPE html>
<html lang="en">

@include('theme.partial.head')

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <!-- Brand -->
            <a class="navbar-brand" href="/">Library</a>

            <!-- Toggle Button for Small Screens -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Navbar Links -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <!-- All Books Link -->
                    {{-- <li class="nav-item"><a class="nav-link" href="/books">All Books</a></li> --}}

                    <!-- Add Book Link -->
                    <li class="nav-item"><a class="nav-link" href="{{ route('books.create') }}">Add Book</a></li>

                    <!-- Dropdown Menu -->
                    <div class="dropdown nav-item">
                        <button class="btn btn-light dropdown-toggle" type="button" id="categoryDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Categories
                        </button>
                        

                            @if (count($categories) > 0)
                                <ul class="dropdown-menu" aria-labelledby="categoryDropdown">
                                    @foreach ($categories as $category)
                                        <li><a class="dropdown-item"
                                                href="{{ route('books.category') }}">{{ $category->name }}</a></li>
                                    @endforeach
                                </ul>
                           
                        @endif

                    </div>
                    @if (!Auth::check())
                        <div class="d-flex justify-content-end">
                            <!-- Login Link -->
                            <li class="nav-item">
                                <a class="btn btn-outline-light ms-2" href="{{ route('login') }}">Login</a>
                            </li>
                        </div>
                    @else
                        <div class="d-flex justify-content-end align-items-center">
                            <!-- User Dropdown Button -->
                            <button class="btn btn-light dropdown-toggle" type="button" id="userDropdown"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </button>

                            <!-- Dropdown Menu -->
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                <li>
                                    <form id="logoutForm" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="#" id="dropdown-itemlogout"
                                        onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">Logout</a>
                                </li>
                            </ul>
                        </div>
                    @endif

                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

<style>
    /* Custom Styles */
    .navbar {
        background-color: #343a40;
        /* Dark Background */
    }

    .navbar-brand {
        font-size: 1.5rem;
        font-weight: bold;
    }

    .dropdown-menu {
        background-color: #f8f9fa;
        /* Light Background for Dropdown */
    }

    .dropdown-item:hover {
        background-color: #007bff;
        /* Blue Highlight */
        color: #fff;
        /* White Text */
    }

    #dropdown-itemlogout:hover {
        background-color: #ff0000;
        /* Blue Highlight */
        color: #fff;
        /* White Text */
    }

    .btn-outline-light {
        border-color: #ffffff;
        color: #ffffff;
    }

    .btn-outline-light:hover {
        background-color: #ffffff;
        color: #343a40;
    }

    /* تأثيرات على زر المستخدم */
    #userDropdown {
        border-radius: 20px;
        margin-left: 20px
    }

    /* تأثيرات على القائمة المنسدلة */
    .dropdown-menu {
        border-radius: 10px;
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>

</html>
