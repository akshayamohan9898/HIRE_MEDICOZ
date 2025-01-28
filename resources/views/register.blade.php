<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <div class="tab-content" id="myTabContent">
        <div class="twm-l-media">
            <img src="{{ asset('assets/image/hiremedicoz logo.jpeg') }}" alt="" width="200" height="200">


        </div>
        <div class="tab-pane fade show active" id="sign-candidate">
            <div class="row">
                <form method="POST" action="{{ route('register.submit') }}" enctype="multipart/form-data"  autocomplete="off">
                    @csrf

                  
                

                <div class="col-lg-12">
                    <div class="form-group mb-3">
                        <label for="name" class="control-label">name</label>
                        <input name="name" type="text" required="" class="form-control" placeholder="Name*">
                        <br>
                    </div>
                </div>

               

                <div class="col-lg-12">
                    <div class="form-group mb-3">
                        <label for="field" class="control-label">Field of Profession</label>
                        <select name="field" id="dropdown">
                            <option value="MBBS">MBBS</option>
                            <option value="BDS">BDS</option>
                            <option value="BAMS">BAMS</option>
                            <option value="BHMS">BHMS</option>
                          </select>
                          
                    </div>
                </div>
                
                <div class="col-lg-12">
                    <div class="form-group mb-3">
                        <label for="user_email" class="control-label">Email</label>
                        <input 
                        type="email" 
                        class="form-control" 
                        id="user_email" 
                        name="user_email" 
                        required 
                        placeholder="Enter your email"
                        autocomplete="off"
                    >
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group mb-3">
                        <label for="phonenumber" class="control-label">Phone</label>
                        <input 
                            type="tel" 
                            class="form-control" 
                            id="phonenumber" 
                            name="phonenumber" 
                            pattern="^\d{10}$" 
                             required 
                            placeholder="Enter a 10-digit phone number"
                                >   
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="form-group mb-3">
                        <label for="user_password" class="control-label">Password</label>
                       <input 
                            type="password" 
                            class="form-control" 
                            id="user_password" 
                            name="user_password" 
                            minlength="8" 
                            required 
                            placeholder="Enter your password"
                            autocomplete="off"
                            pattern="^(?=.*[A-Z])(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$" 
                            title="Password must be at least 8 characters long, contain at least one uppercase letter, and one special character (!@#$%^&*)."
                        >
                    </div>
                </div>
                
              
                
                <div class="col-md-12">
                    <input type="submit" class="btn btn-primary">
                </div>
</form>
            </div>
        </div>
      
</body>
</html>