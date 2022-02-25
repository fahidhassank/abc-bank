<nav class="navbar navbar-light bg-white border-bottom navbar-expand-md px-1">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">ABC Bank</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm py-0 px-1" id="navbar">
    <div class="container">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav w-100 justify-content-between ">
                <li class="nav-item">
                    <a class="nav-link {{ isActiveRoute('home') }}" href="{{ route('home') }}"><i class="bi bi-house-door me-1"></i>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ isActiveRoute('deposit') }}" href="{{ route('deposit') }}"><i class="bi bi-cloud-upload me-1"></i>Deposit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ isActiveRoute('withdraw') }}" href="{{ route('withdraw') }}"><i class="bi bi-cloud-download me-1"></i>Withdraw</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ isActiveRoute('transfer') }}" href="{{ route('transfer') }}"><i class="bi bi-send me-1"></i>Transfer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ isActiveRoute('statement') }}" href="{{ route('statement') }}"><i class="bi bi-journal-text me-1"></i>Statement</a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" id="logout-form">
                        @csrf
                        <a class="nav-link" role="button" onclick="document.getElementById('logout-form').submit()"><i class="bi bi-box-arrow-right me-1"></i>Logout</a>
                    </form>

                </li>
            </ul>
        </div>
    </div>
</nav>
