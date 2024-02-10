<x-guest-layout>
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <div class="container">
        <div class="signin-content">
            <div class="signin-form">
                <h2 class="form-title">Login</h2>
                <form method="POST" class="register-form" id="login-form" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email" required/>
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" required autocomplete="current-password"/>
                    </div>
                    <div class="form-group form-button">
                        <input type="submit" name="login" class="form-submit" value="Log in"/>
                        <a href="/register">créer un compte</a>
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    </div>
                </form>
            </div>
            <div class="illustration">
                <img src="/img/Job-Interview-Illustration.jpg">
            </div>
        </div>
    </div>
    <style>
        html {
            font-family: Nunito, sans-serif;
            font-size: 13px;
            line-height: 1.8;
            color: #222;
            background: #f8f8f8;
            font-weight: 400;
            height: 100%;
        }

        a {
            text-decoration: none;
            margin-left: 20px;
            color: black;
        }

        body {
            display: grid;
            align-items: center;
            height: 100%;
            margin: 0;
        }

        .signin-content{
            display: flex;
            align-items: center;
            padding: 67px 0;
        }

        .container {
            width: 770px;
            background: #ffffff;
            margin: 0 auto;
            box-shadow: 0 15px 16px 0.17px rgba(0, 0, 0, 0.05);
            border-radius: 20px;
        }

        .position-center {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .form-title {
            line-height: 1.66;
            margin: 0 0 30px 0;
            padding: 0;
            font-weight: 550;
            color: #222;
            font-size: 36px;
        }

        .form-submit {
            display: inline-block;
            background: #60B1C2;
            color: #fff;
            border-bottom: none;
            width: auto;
            padding: 15px 39px;
            border-radius: 5px;
            margin-top: 25px;
            cursor: pointer;
        }

        .form-submit:hover {
            background: #99CDD8;
        }

        .form-group {
            position: relative;
            margin-bottom: 25px;
            overflow: hidden;
        }

        input {
            width: 100%;
            display: block;
            border: none;
            border-bottom: 1px solid #999;
            padding: 6px 30px;
            box-sizing: border-box;
        }

        input:focus {
            border-bottom: 1px solid #222;
        }

        input::-webkit-input-placeholder {
            color: #999;
        }
        input:focus::-webkit-input-placeholder {
            color: #222;
        }

        label {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            color: #222;
        }

        .signin-form {
            margin-right: 40px;
            margin-left: 80px;
            width: 50%;
            overflow: hidden;
        }

        img {
            margin-right: 20px;
            width: 33rem;
        }

        @media screen and (max-width: 1000px) {
            .illustration {
                display: none;
            }
            .container {
                width: 500px;
            }

            .signin-form {
                width: 50%;
            }
        }

        @media screen and (max-width: 700px) {
            .illustration {
                display: none;
            }
            .container {
                width: 400px;
            }

            .signin-form {
                width: 70%;
                margin: 0 50px;
            }
        }
    </style>
</x-guest-layout>
