<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Project</title>
    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}"/>
</head>
<body>
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        @guest
        <li class="nav-item">
          <a class="nav-link" href="{{route('signinform')}}">Signin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('signupform')}}">Signup</a>
        </li>
        @else
            <form method="post" action="{{route('logout')}}">
              @csrf
                <button type="submit" class="btn btn-outline-info">Logout</button>
            </form>

            <li class="nav-item dropdown" style="float:right">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{Auth::user()->name}}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        @endguest
        
      </ul>
      
    </div>
  </div>
</nav>

     <div class="container mt-4">
        <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                   <h2>Add Project</h2>
                  <form method="post" action="{{route('storeproject')}}">
                       @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Project Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                            
                    <button type="submit" class="btn btn-primary mt-4">Submit</button>
                    </form>
              </div>
              <div class="col-md-2"></div>
        </div>
    </div>
<script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>