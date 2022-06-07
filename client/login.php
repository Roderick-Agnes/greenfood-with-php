<?php
  // Start the session
  session_start();
  include_once("core/libs/curl-helper.php");
  include_once("core/register-core.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Homework</title>
    <!-- Font Awesome -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
    rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
    rel="stylesheet"
    />
    <!-- MDB -->
    <link
    href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.css"
    rel="stylesheet"
    />
    <link src="css/styles.css" rel="stylesheet"/>
</head>
<body>
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="https://anhdep123.com/wp-content/uploads/2020/11/hinh-anh-mot-so-loai-rau.png"
            class="img-fluid" alt="Phone image" accept="image/*">
        </div>
        
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1 p-4 card cascading-right" 
        style="background: hsla(0, 0%, 100%, 0.55);
              backdrop-filter: blur(30px);">
          <!-- Tabs navs -->
          <ul class="nav nav-tabs mb-3 text-center" id="ex1" role="tablist">
            <li class="nav-item" role="presentation">
              <a
                class="nav-link active"
                id="login-tab"
                data-mdb-toggle="tab"
                href="#ex1-tabs-1"
                role="tab"
                aria-controls="ex1-tabs-1"
                aria-selected="true"
                onClick="handleTabClick(this.id)"
                >Login</a
              >
            </li>
            <li class="nav-item" role="presentation">
              <a
                class="nav-link"
                id="register-tab"
                data-mdb-toggle="tab"
                href="#ex1-tabs-2"
                role="tab"
                aria-controls="ex1-tabs-2"
                aria-selected="false"
                onClick="handleTabClick(this.id)"
                >Register</a
              >
            </li>
          </ul>
          <!-- Tabs navs -->

          <!-- Tabs content -->
          <div class="tab-content" id="ex1-content">
            <!-- Login tab content -->
            <div
              class="tab-pane fade show active"
              id="ex1-tabs-1"
              role="tabpanel"
              aria-labelledby="login-tab"
            >
              <form >
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="text" id="form1Example13" name="username" class="form-control form-control-lg" />
                <label class="form-label" for="form1Example13">Username</label>
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="form1Example23" name="password" class="form-control form-control-lg" />
                <label class="form-label" for="form1Example23">Password</label>
              </div>

              <div class="d-flex justify-content-around align-items-center mb-4">
                <!-- Checkbox -->
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                  <label class="form-check-label" for="form1Example3"> Remember me </label>
                </div>
                <a href="#!">Forgot password?</a>
              </div>

              <!-- Submit button -->
              <button type="submit" id="sign-in-button" class="btn btn-primary btn-lg btn-block">Sign in</button>
              <div class="divider d-flex align-items-center my-4">
                <p class="text-center fw-bold mx-3 mb-0 text-muted w-100">OR</p>
              </div>

              <a class="btn btn-primary btn-lg btn-block" style="background-color: #3b5998" href="#!"
                role="button">
                <i class="fab fa-facebook-f me-2"></i>Continue with Facebook
              </a>
              <a class="btn btn-primary btn-lg btn-block" style="background-color: #55acee" href="#!"
                role="button">
                <i class="fab fa-twitter me-2"></i>Continue with Twitter</a>

            </form>
            </div>


            <!-- Register tab content -->
            <div class="tab-pane fade" id="ex1-tabs-2" role="tabpanel" aria-labelledby="register-tab">
              <form action="core/register-core.php" method="post" enctype="multipart/form-data">
                <!-- Fullname input -->
                <div class="form-outline mb-4">
                  <input type="text" id="form1Example13" name="fullname" class="form-control form-control-lg" />
                  <label class="form-label" for="form1Example13">Full name</label>
                </div>

                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" id="form1Example23" name="email" class="form-control form-control-lg" />
                  <label class="form-label" for="form1Example23">Email</label>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-3 pb-2">
                    <!-- Phone input -->
                    <div class="form-outline">
                      <input type="text" id="form1Example13" name="phone" maxlength="10" class="form-control form-control-lg" />
                      <label class="form-label" for="form1Example13">Phone</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-3 pb-2">
                    <!-- Select sex input -->
                      <select id="form1Example13" name="sex" class="form-control form-control-lg browser-default custom-select">
                        <option selected>Select your sex...</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                      </select>
                  </div>
                </div>

                <!-- Address input -->
                <div class="form-outline mb-4">
                  <input type="text" id="form1Example13" name="address" class="form-control form-control-lg" />
                  <label class="form-label" for="form1Example13">Address</label>
                </div>

                <div class="row">
                  <div class="col-md-6 mb-4 pb-2">
                    <!-- Username input -->
                    <div class="form-outline">
                      <input type="text" id="form1Example13" name="username" class="form-control form-control-lg" />
                      <label class="form-label" for="form1Example13">Username</label>
                    </div>
                  </div>
                <div class="col-md-6 mb-4 pb-2">
                  <!-- Password input -->
                  <div class="form-outline">
                    <input type="password" id="form1Example13" name="password" class="form-control form-control-lg" />
                    <label class="form-label" for="form1Example13">Password</label>
                  </div>  
                </div>
              </div>
                

                <!-- Submit button -->
                <button type="submit" class="btn btn-danger btn-lg btn-block">Sign up</button>


              </form>
            </div>
          </div>
          <!-- Tabs content -->

        </div>
      </div>
    </div>
  </section>



    <!-- MDB -->
    <script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"
    ></script>

    <script type="text/javascript">
      function handleTabClick(clicked_id)
      {
          sessionStorage.setItem("tabName", clicked_id);
          //alert(sessionStorage.getItem("tabName"));
          
      }
      
      
    </script>
    
</body>
</html>