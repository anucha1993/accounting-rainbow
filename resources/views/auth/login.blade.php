<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACCOUNT LOGIN</title>
    <!-- Bootstrap CSS -->
    <link href="{{ URL::asset('dist/css/style.min.css') }}" rel="stylesheet" />
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Kanit', sans-serif;
        }
        .card {
            left: 130px !important;
            right: 130px !important;
            top: 130px;
            border: 1px solid #ced4da;
            border-radius: 50px;
            box-shadow: 0 0 8px rgb(0, 0, 0); /* เพิ่มเงาให้กับ card */
            width: 600px;
            height: 500px;
            padding-left: 20px;
            padding-right: 20px;
            background-color: #e1e5e9;
        }
        .form-control {
            border: 1px solid #ced4da;
            border-radius: 30px;
            box-shadow: none;
            height: 50px;
            padding-left: 25px;
      
        }

        .btn-submit {
            border: 1px solid #ffffff00;
            border-radius: 30px;
            box-shadow: none;
            height: 50px;
            background-color: rgb(43, 43, 151);
        }
        .btn-submit:hover {
              border: 1px solid #ffffff00;
            background-color: rgb(255, 210, 64);
            color: #ffffff; /* เพิ่มสีข้อความเมื่อ hover */
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                      <br>
                      <div style="display: flex; align-items: center;">
                        <img src="{{URL::asset('assets/images/logos/rainbow_logo.png')}}" alt="homepage" class="dark-logo" style="width: 80px; margin-right: 10px;" />
                        <h5 class="card-title" style="color: rgb(43, 43, 151); font-size: 20px; margin: 0;"><b>ระบบงานบัญชี / RAINBOW VISA SERVICE</b></h5>
                    </div>
                    
                    
                        <br>
                        <form action="{{ route('login') }}" method="post">
                          @csrf
                            <div class="mb-4">
                                <label for="username" class="form-label" style="color: rgb(43, 43, 151);"><b>อีเมล / Email</b> <span class="text-danger">*</span></label>
                                <input type="text" name="email" class="form-control" id="username" placeholder="Enter username">
                                @error('email')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                              @enderror

                            </div>
                            <div class="mb-4">
                                <label for="password" class="form-label" style="color: rgb(43, 43, 151);"><b>รหัสผ่าน / Password</b> <span class="text-danger">*</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter password">

                                @error('password')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            </div>
                            <div class="form-group">
                              <div class="d-flex">
                                  <div class="checkbox checkbox-info pt-0">
                                      <input id="checkbox-signup" type="checkbox"
                                          class="material-inputs chk-col-indigo"
                                          {{ old('remember') ? 'checked' : '' }} />
                                      <label for="checkbox-signup" style="color: rgb(43, 43, 151);"><b> จดจำข้อมูล</b> </label>
                                  </div>
                                  
                              </div>
                          </div>
                          <br>

                            <button type="submit" class="btn btn-submit btn-primary w-100"><b>เข้าใช้งานระบบ / Login</b></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
