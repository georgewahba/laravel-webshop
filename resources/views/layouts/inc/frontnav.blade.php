<link rel="stylesheet"
href=
"https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


<style>
  body{
    background-color: #80cee1;
  }
  .btn-primary-outline {
    position: relative;
    top: 6px;
    background-color: transparent;
    border-color: transparent;
    box-shadow: none;
    color: #007bff;
    
}

</style>

<nav class="navbar-expand-lg " style="background-color: pink;">
    <div class="container d-flex" >
      <a class="navbar-brand" href="{{ url('/') }}">Robbins Bakery</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('catagory') }}">Porducts</a>
          </li>   
          <li class="nav-item">
            <a class="nav-link" href="{{ url('contact') }}">Contact</a>
          </li>   
          @if (Auth::user())
          <li class="nav-item">
            <a class="nav-link" href="{{ url('cart') }}">cart</a>
          </li> 
          <li class="nav-item">
            <a class="nav-link" href="{{ url('myorder') }}">my orders</a>
          </li> 
          <li class="nav-item">
            <form method="post" action="/logout">
              @csrf
            <button type="submit" class="btn-primary-outline " href="/logout">logout</button>
            </form>
          </li>  
          @else
          <li class="nav-item">
            <a class="nav-link" href="/login">login</a>
          </li>          
          <li class="nav-item">
            <a class="nav-link" href="/register">register</a>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>