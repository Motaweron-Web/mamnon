@extends('front/layouts/app')
@section('content')

    <section class="breadCrumb">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                    <li>
                        <a href="{{url('/')}}">
                            <i class="fa-regular fa-angle-right"></i>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </section>
    <section class="login">
        <div class="container">
            <!-- min-width 991px -->
            <div class="min_width991">
                <div class="row align-items-center justify-content-between">
                    <!-- img gif -->
                    <div class="col-lg-6 ">
                        <div class="img">
                            <img src="{{asset('/assets/front/')}}/img/Authentication.gif" alt="login">
                        </div>
                    </div>
                    <div class="col-lg-6 ">
                        <div class="loginForm">
                            <!-- logo -->
                            <div class="logo">
                                <img src="{{asset('/assets/front/')}}/img/logo.png" alt="logo">
                            </div>
                            <!-- text -->
                            <div class="text">
                                <p>
                                    مرحبا
                                </p>
                                <p>
                                    اهلا بك في ممنون
                                </p>
                            </div>
                            <!-- input -->
                            <div class="phone">
                                <form id="Formlogin" method="POST">
                                    @csrf
                                    {{--                                    <input id="phone" class="NumberInput phone1" type="number" placeholder="ادخل رقم الهاتف">--}}
                                    <input required id="phone_code" type="text" name="phone_code" value="+964"
                                           class="form-control w-100">

                                    <input required id="phone" autocomplete="off" type="number"
                                           placeholder="ادخل رقم الهاتف" value="" name="phone"
                                           class="NumberInput phone1">

                                    <div class="remember">
                                        <input type="checkbox" name="remember" id="remember">
                                        <label for="remember">
                                            اوافق علي<span> سياسة الاستخدام </span>
                                        </label>
                                    </div>
                                    <div id="recaptcha-container"></div>
                                    <div class="button">
                                        <button form="Formlogin" type="submit"> التسجيل</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!--  -->
                </div>
            </div>

        </div>
    </section>
    <div class="fullPage">
        <div class="container">
            <a class="angle" href="index.html">
                <i class="fa-regular fa-angle-right"></i>
            </a>
            <div class="max_width991">
                <div class="loginForm">
                    <div class="row">
                        <!-- logo -->
                        <div class="col-12">
                            <div class="logo">
                                <img src="img/logo.png" alt="">
                            </div>
                        </div>
                        <!-- text -->
                        <div class="col-12">
                            <div class="text">
                                <p>
                                    مرحبا
                                </p>
                                <P>
                                    اهلا بك في ممنون
                                </P>
                            </div>
                        </div>
                        <!-- phone -->
                        <div class="col-12">
                            <div class="phone">
                                <form>
                                    <input class="NumberInput phone2" type="number" placeholder="ادخل رقم الهاتف">
                                    <div class="remember">
                                        <input type="checkbox" name="remember" id="remember">
                                        <label for="remember">
                                            اوافق علي<span> سياسة الاستخدام </span>
                                        </label>
                                    </div>
                                    <div class="button">
                                        <button type="submit"> التسجيل</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="codeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-body">
                    <form id="ConfirmCodeForm" method="post" {{--action="{{url('post_login')}}"--}}>
                        @csrf
                        <div class="modal-body">
                            <div class="title pb-4 pt-3 ">
                                <h6 style="font-weight: bold"> {{trans('web_lang.Confirm code')}} </h6>
                            </div>
                            <div class="form-outline">
                                <input class="form-control numbersOnly" id="verificationCode" type="text" maxlength="6">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-dark close_model" data-bs-dismiss="modal"
                                    aria-label="Close">Cancel
                            </button>
                            <button type="submit" id="ConfirmPhoneCode" class="btn btn-success">Confirm</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!--  -->
    {{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}

    {{--    1122717960--}}
@endsection
@section('js')
    <script>
        $(document).on('keyup', '#phone', function (ev) {
            var my_phone = this.value;
            this.value = my_phone.replace(/^0+/, '');
        });
    </script>

    <script src="https://www.gstatic.com/firebasejs/6.0.2/firebase.js"></script>


    <script>

        $('form#Formlogin').submit(function (e) {
            e.preventDefault();
            phoneSendAuth();
            $('#codeModal').modal('show');
        });

        // Initialize Firebase
        var config = {
            apiKey: "AIzaSyAy0pxgLVRxpzTCSD65Kg6EWnqikFxtfKQ",
            authDomain: "mamnon-tajer.firebaseapp.com",
            projectId: "mamnon-tajer",
            storageBucket: "mamnon-tajer.appspot.com",
            messagingSenderId: "728530830905",
            appId: "1:728530830905:web:4c9cbacdb581d7929befe8",
            measurementId: "G-CSG22PF0PS"
        };
        firebase.initializeApp(config);


        window.onload = function () {
            render();
        };

        function render() {
            window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
            recaptchaVerifier.render();
        }

        $(document).on('submit', 'form#ConfirmCodeForm', function (ev) {
            // alert(1)
            ev.preventDefault();
            var myForm = $("#Formlogin")[0]
            var formData = new FormData(myForm)
            var code = $("#verificationCode").val();
            // alert(code)

            coderesult.confirm(code).then(function (result) {
                var user = result.user;

                $.ajax({
                    url: '{{route('do_login')}}',
                    type: 'POST',
                    data: formData,
                    beforeSend: function () {

                        // $('.spinner').show()
                    },
                    success: function (data) {
                        alert('هناك خطاء ما')

                        $('#codeModal').modal('hide');
                        // window.setTimeout(function () {
                        // $('.spinner').hide()
                        // toastr().success('تم تأكيد الهاتف بنجاح')
                        if (data.status == 'login') {
                            window.location.href = data.url;
                        }
                        if (data.status == 'register') {
                            window.location.href = data.url;
                            // alert('register')
                            // $('html').html(data.html)
                        }

                        // }, 1500);
                    },
                    error: function (data) {
                        $('#codeModal').modal('hide');
                        console.log(data);

                        // $('.spinner').hide()
                        if (data.status === 500) {
                           // alert('هناك خطاء ما')
                            $('#close_modal').click();
                        }
                    },//end error method

                    cache: false,
                    contentType: false,
                    processData: false
                });

            }).catch(function (error) {
                //$('#exampleModal').modal('hide');
                alert('كود الهاتف غير صحيح')
            });
        });

        function phoneSendAuth() {

            var number = $("#phone_code").val() + $("#phone").val();
            // var number = '+2001098380656';
            // alert(number+' تم ارسال كود تأكيد على رقم هاتفك ')


            firebase.auth().signInWithPhoneNumber(number, window.recaptchaVerifier).then(function (confirmationResult) {
                console.log(confirmationResult)
                window.confirmationResult = confirmationResult;
                coderesult = confirmationResult;

                $("#sentSuccess").text("Message Sent Successfully.");
                $("#sentSuccess").show();

            }).catch(function (error) {
                console.error(error)
                $("#error").text(error.message);
                $("#error").show();
            });

        }


    </script>

@endsection

