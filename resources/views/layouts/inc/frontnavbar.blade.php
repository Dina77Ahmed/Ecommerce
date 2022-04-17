<nav class="navbar navbar-expand-lg navbar-light bg-light ">
    <div class="container">
      <a class="navbar-brand " href="{{url('/')}}">
    Blue Moon
        </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
          <li class="nav-item">
          <a href="{{ route('login') }}" class="btn btn-primary ml-4 text-sm text-gray-700
          dark:text-gray-500 underline me-3 rounded-pill">Log in</a>
          </li>
          <li class="nav-item" >
            <a href="{{ route('register') }}" class="btn btn-primary ml-4 text-sm text-gray-700
            dark:text-gray-500 underline rounded-pill">Register</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>