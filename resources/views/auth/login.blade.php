<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
  
    <title>Sky</title>
   

    <!--Favicon -->
    <link rel="icon" href="{{asset('uploads/logo/favicons/favicon.ico')}}" type="image/x-icon"/>
  

   
    <link href="{{asset('assets/css/style.css')}}?v=<?php echo time(); ?>" rel="stylesheet" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
      crossorigin="anonymous"
    />
  
  </head>
  <body>
    <div class="overflow-hidden position-relative">
      <div class="row">
        <div
          class="col-lg-7 col-xxl-8 vh-100 d-none d-md-block"
          
        >
          <img
            src="{{asset('assets/images/login.png')}}"
            class="w-100"
            height="649"
            alt=""
          />
        </div>
        <div
          class="col-lg-5 col-xxl-4 vh-100 d-flex align-items-center justify-content-center"
        >
          <form class="card border-0 shadow-none px-xxl-5 mx-5" action="{{ route('login') }}" method="POST" id="demo-form">
            @csrf
            <h1 class="m-5 text-center fw-bold">Log in to <span class="text-blue">Sky</span></h1>
           
                  
            <div class="card-body">
              <div class="mb-3">
                <label for="email" class="form-label fw-bold">Email</label>
                <input
                  type="email"
                  class="form-control p-3 bg-light border-0 shadow @error('email') is-invalid @enderror"
                  id="email"  name="email"
                  placeholder="Enter your email"
                />
                @error('email')

                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror

              </div>
              <div class="mb-3">
                <label for="password" class="form-label fw-bold "
                  >Password</label
                >
               

                <div class="position-relative">
                  <input
                    type="password"
                    class="form-control p-3 bg-light border-0 shadow @error('password') is-invalid @enderror"
                    id="password" name ="password"
                    placeholder="Enter your password"
                  />
                   @error('password')

                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                  <p class="position-absolute" style="bottom: 5%; right: 3%">
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="15px"
                      viewBox="0 0 576 512"
                      style="cursor: pointer; display: none;"
                      id="show"
                      onclick="passwordToggle()"
                    >
                      <path
                        d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"
                      />
                    </svg>
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="15px"
                      viewBox="0 0 640 512"
                      style="cursor: pointer; display: block;"
                      id="hide"
                      onclick="passwordToggle()"
                    >
                      <path
                        d="M38.8 5.1C28.4-3.1 13.3-1.2 5.1 9.2S-1.2 34.7 9.2 42.9l592 464c10.4 8.2 25.5 6.3 33.7-4.1s6.3-25.5-4.1-33.7L525.6 386.7c39.6-40.6 66.4-86.1 79.9-118.4c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C465.5 68.8 400.8 32 320 32c-68.2 0-125 26.3-169.3 60.8L38.8 5.1zM223.1 149.5C248.6 126.2 282.7 112 320 112c79.5 0 144 64.5 144 144c0 24.9-6.3 48.3-17.4 68.7L408 294.5c8.4-19.3 10.6-41.4 4.8-63.3c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3c0 10.2-2.4 19.8-6.6 28.3l-90.3-70.8zM373 389.9c-16.4 6.5-34.3 10.1-53 10.1c-79.5 0-144-64.5-144-144c0-6.9 .5-13.6 1.4-20.2L83.1 161.5C60.3 191.2 44 220.8 34.5 243.7c-3.3 7.9-3.3 16.7 0 24.6c14.9 35.7 46.2 87.7 93 131.1C174.5 443.2 239.2 480 320 480c47.8 0 89.9-12.9 126.2-32.5L373 389.9z"
                      />
                    </svg>
                  </p>
                </div>
              </div>
             
              <!-- <p class="text-end"><a href="/">Forget Password</a></p> -->
              <div class="py-3">
                <button class="btn btn-primary w-100 py-3">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div
        class="position-absolute bg-white py-2 px-4 rounded shadow"
        style="top: 30px; left: 30px"
      >
        <a
          href="{{url('/')}}"
          class="text-dark font-bold d-flex justify-items-center text-decoration-none fw-bold"
        >
          <svg
            xmlns="http://www.w3.org/2000/svg"
            width="15px"
            viewBox="0 0 448 512"
          >
            <path
              d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"
            />
          </svg>
          <span class="ms-2">Back To Home</span>
          
        </a>
      </div>
    </div>

    <script>
      function passwordToggle() {
        var x = document.getElementById("password");
        var y = document.getElementById("show");
        var z = document.getElementById("hide");

        if (x.type === "password") {
          x.type = "text";
          y.style.display = "block";
          z.style.display = "none";
        } else {
          x.type = "password";
          y.style.display = "none";
          z.style.display = "block";
        }
      }
    </script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
      crossorigin="anonymous"
    ></script>
     
  </body>
</html>