<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register Page</title>
</head>
<style>
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: system-ui;
}

body{
    height: 100vh;
    background-color: gainsboro;
    display: flex;
    justify-content: center;
    align-items: center;
}

.login-page{
    width: 350px;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 40px;
    box-shadow: 0 0 20px rgb(0, 0, 0, 0.24);
    background: #fff;
    border-radius: 10px;
    transition: opacity 0.5 ease;
}

.login-page.hidden{
    display: none;
}

.login-page.visible {
    display: block;
}

.login-page h2{
    text-align: center;
    margin-bottom: 30px;
}

.input-box{
    margin-bottom: 10px;
}

.input-box input{
    width: 100%;
    font-size: 16px;
    padding: 15px;
    border: 1px solid #ddd;
    background: #f2f2f2;
    outline: none;
    margin-bottom: 10px;
    border-radius: 10px;
    transition: border-color 0.3s ease, box-shadow 0.3s ease, color 0.3s ease;
}

.input-box input:focus{
    border-color: #2980b9;
    box-shadow:  0 0 5px rgb(41, 128, 185, 0.5);
}

.login-page input[type="submit"]{
    width: 100%;
    font-size: 16px;
    padding: 15px;
    font-weight: bold;
    letter-spacing: 2px;
    background-color: #2980b9;
    border: 0;
    color: white;
    text-transform: uppercase;
    transition: background-color 0.5 ease;
    cursor: pointer;
    margin-top: 5px;
    border-radius: 10px;
}

.login-page input[type="submit"]:hover{
    background-color: #206694;
}

.login-page p{
    text-align: center;
    margin-top: 15px;
}

.login-page a {
    text-decoration: none;
    color: #2980b9;
    font-weight: 500;
}

.remember-me {
    margin-bottom: 10px;
    text-align: center;
    display: flex;
    justify-content: space-between;
    margin-top: 10px;
}

.remember-me a {
    margin-left: 10px;
    font-weight: 500;
}

#registerform, #forgotform{
    display: none;
}

#registerform:target, #forgotform:target {
    display: block;
}

#loginform {
    display: block;
}

#loginform:target{
    display: block;
}


.input-box input[type="password"]{
    padding-right: 30px;
}

.input-box .showpassword{
    position: absolute;
    top: 200px;
    font-size: 25px;
    left: 270px;
    transform: translateY(-50%);
    cursor: pointer;
}

</style>
<body>
    <div class="login-page" id="loginform">
        <form action="process.php" method="POST">
            <h2>Login Page</h2>
            <div class="input-box">
                <input type="email" placeholder="Email" required name="emaill">
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" required id="password" name="passwordd">
                <span class="showpassword" id="showpassword">&#x1F441</span>
            </div>
            <div class="remember-me">
                <input type="checkbox">
                <label for="remember-me">
                    Remember Me? <a href="#forgotform">Forgot Password?</a>
                </label>
            </div>
            <input type="submit" value="Login" name="login">
            <p>Don't have an account? <a href="#registerform">Register Here</a></p>
        </form>
    </div>
    <div class="login-page" id="registerform">
        <form action="process.php" method="POST">
            <h2>Register Page</h2>
            <div class="input-box">
                <input type="email" placeholder="Email" required name="email">
            </div>
            <div class="input-box">
                <input type="text" placeholder="Username" required name="username">
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" required name="password">
            </div>
            <input type="submit" value="Register" name="register">
            <p>Do you have an account? <a href="#loginform">Login Here</a></p>
        </form>
    </div>
    <div class="login-page" id="forgotform">
        <form action="process.php" method="POST">
            <h2>Forgot Password</h2>
            <div class="input-box">
                <input type="email" required placeholder="Email" name="forgotemail">
            </div>
            <input type="submit" value="Reset Password" name="resetpassword">
            <p>Remembered your password? <a href="#loginform">Login Here</a></p>
        </form>
    </div>
</body>
<script>
    document.getElementById("showpassword").addEventListener("click", function(){
        var passwordField = document.getElementById("password");
        if (passwordField.type === "password"){
            passwordField.type = "text";
            this.textContent = "🙉";
        } else {
            passwordField.type = "password";
            this.textContent = "🙈"
        }
    });
</script>
</html>