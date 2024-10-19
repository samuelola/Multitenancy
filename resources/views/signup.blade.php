<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        <li class="nav-item">
          <a class="nav-link" href="{{route('signinform')}}">Signin</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('signupform')}}">Signup</a>
        </li>
        
        
        <li class="nav-item dropdown" style="float:right">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
      
    </div>
  </div>
</nav>
    <div class="container mt-4">
        <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                   <h2>Register</h2>
                  <form method="post" action="{{route('signup')}}">
                      @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="name" value="{{old('name')}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>  
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" value="{{$invitationEmail ?? old('email')}}" id="exampleInputEmail1" aria-describedby="emailHelp"
                         
                        >
                    </div>    
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                        <input name="password_confirmation" type="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Subdomain</label>
                        <input type="text" name="subdomain" value="{{old('subdomain')}}" class="form-control" id="subdomain" aria-describedby="emailHelp" require>
                    </div> 
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
              </div>
              <div class="col-md-2"></div>
        </div>
    </div>
    <script src="{{asset('js/bootstrap.bundle.min.js')}}"></script>
     <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->
</body>
</html>