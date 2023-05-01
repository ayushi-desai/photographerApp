<!DOCTYPE html>

<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
    body{
    min-height: 100vh;
    display: flex;
    color: var(--color-text);
    background: var(--color-background);
    transition: color 0.5s, background-color 0.5s;
    line-height: 1.6;
    font-family: Inter, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Fira Sans', 'Droid Sans', 'Helvetica Neue', sans-serif;
    font-size: 15px;
    text-rendering: optimizeLegibility;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    background: linear-gradient(90deg, #fc9777, #f9708a) !important;
}
    .free-trial-popup {
    min-height: 100vh;
    width: 70vh;
    text-align: left;
}

.trial-popup-section {
    padding-top: 35px;
    padding-bottom: 25px;
    padding-left: 10%;
    padding-right: 10%;
    background-color: #ffffff;
    border-radius: 7px;
}

.justify-content-center {
    -ms-flex-pack: center!important;
    justify-content: center!important;
}
<style>
.align-items-center {
    -ms-flex-align: center!important;
    align-items: center!important;
}
    .bg-white {
    background-color: #fff!important;
}
.d-flex {
    display: -ms-flexbox !important;
    display: flex !important;
}
.flex-column {
  -ms-flex-direction: column!important;
  flex-direction: column!important;
}

    .trial-popup-section {
    padding-top: 20px;
    padding-bottom: 50px;
    border-radius: 10px;
}
    .text-center {
    text-align: center!important;
}

.font-weight-bold {
    font-weight: 700!important;
}

.trial-btn{
    background-color: #ff6c61;
    color: #ffffff;
    border: none;
    border-radius: 3px;
    padding: 10px 8%;
    margin-top: 20px;
    text-decoration: none;
}
.email-div{
    margin: 0 auto;
    padding: 2rem;
    font-weight: normal;
}
    </style>
     </head>
  <body>
    <div class="email-div">
  <div class="free-trial-popup d-flex justify-content-center align-items-center">
  <div class="trial-popup-section bg-white d-flex flex-column">
        <div class="text-center">
            <img src="{{asset('cg-logo.png')}}" class="img-fluid trial-img" style="margin-top: 20px;width: 50px;height: 50px;">
        </div>
        <h3 class="trial-popup-heading font-weight-bold text-center">Forgot your Password?</h3>
        <p class="trial-text text-center">If you requested to reset the password, please continue with code below.</p>
        <h3 class="trial-popup-heading font-weight-bold text-center">{{ $resetCode? $resetCode : ''}}</h3>
        <p class="flex-container text-center">
            <a href="#" class="trial-btn">Reset Password</a>
        </p>
        <p class="trial-text text-center">This link will expire after 24h.</p>
    </div>
</div>  
</div>  
</body>
</html>
