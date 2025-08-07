<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register | Task Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Section: Design Block -->
    <section class="">
        <!-- Jumbotron -->
        <div class="px-4 py-5 px-md-5 text-center text-lg-start">
            <div class="container">
                <!-- Error Messages -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @include('_message')

                <div class="row gx-lg-5 align-items-center justify-content-center">
                    <div class="col-lg-6 mb-5 mb-lg-0">
                        <div class="card">
                            <div class="card-body py-5 px-md-5">
                                <form action="{{ url('register_post') }}" method="post">
                                    @csrf
                                    <h2 class="mb-4">Create Account</h2>

                                    <!-- Username -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example1">Username</label>
                                        <input type="text" name="name" id="form3Example1" class="form-control" 
                                               placeholder="Username" required value="{{ old('name') }}"/>
                                    </div>
                                    
                                    <!-- Email input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example3">Email address</label>
                                        <input type="email" name="email" id="form3Example3" class="form-control" 
                                               placeholder="Email" required value="{{ old('email') }}"/>
                                    </div>

                                    <!-- Password input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example4">Password</label>
                                        <input type="password" name="password" id="form3Example4" class="form-control" 
                                               placeholder="Password" required/>
                                    </div>

                                    <!-- Confirm Password input -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example5">Confirm Password</label>
                                        <input type="password" name="confirm_password" id="form3Example5" 
                                               class="form-control" placeholder="Confirm Password" required/>
                                    </div>

                                    <!-- Select Role -->
                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form3Example6">Select Role</label>
                                        <select id="form3Example6" class="form-select" required name="is_role">
                                            <option value="" disabled selected>Select your role</option>
                                            <option {{ old('is_role') == 'admin' ? 'selected' : '' }} value="admin">Admin</option>
                                            <option {{ old('is_role') == 'user' ? 'selected' : '' }} value="user">User</option>
                                        </select>
                                    </div>

                                    <!-- Submit button -->
                                    <button type="submit" class="btn btn-primary btn-block mb-4">
                                        Create Account
                                    </button>
                                    
                                    <p>Already have an account? 
                                        <a href="/login" class="link-info text-decoration-none">Sign in here</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>
    <!-- Section: Design Block -->

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>