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
    <!-- profile -->
    <section class="profile">
        <div class="container">
            <!-- min-width 991px -->
            <div class="min_width991">
                <div class="container">
                    <div class="row">

                        <!-- returnLogin -->
                        @guest
                            <div class="col-12">
                                <div class="returnLogin">
                                    <a href="{{url('/login')}}">
                                        <span> يرجي تسجيل الدخول من هنا </span> <i class="fa-regular fa-arrow-left"></i>
                                    </a>
                                </div>
                            </div>
                    @else
                        <!-- dropify -->
                            <form action="{{route('update-profile')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="img">
                                    <img src="{{$user_data->data()['avatar']}}" alt="">
                                </div>
                                <div class="col-12">
                                    <div class="Uplod">
                                        <input type="file" class="dropify" name="avatar">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="firstName" class="label label-primary">First Name</label>

                                    <input type="text" value="{{$user_data->data()['firstName']}}" class="form-control"
                                           placeholder="" name="firstName" id="firstName">
                                </div>
                                <div class="col-12">

                                    <label for="lastName" class="label label-primary">last Name</label>

                                    <input type="text" value="{{$user_data->data()['lastName']}}" class="form-control"
                                           placeholder="" name="lastName" id="lastName">
                                </div>
                                <div class="col-12">
                                    <label for="lastName" class="label label-primary">Phone Number</label>
                                    <label class="form-control"> {{$user_data->data()['phoneNumber']}}</label>
                                </div>
                                <div class="col-12">
                                    <div class="langue">
                                        <button type="submit" class="btn btn-success bg-success">
                                            تعديل البيانات
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>


                    <!--langue  -->
                    <div class="col-12">
                        <div class="langue">
                            <select name="" class="select" id="">
                                <option value="" selected>اللغة</option>
                                <option value="">العربية</option>
                                <option value="">الانجليزية</option>
                            </select>
                        </div>
                    </div>
                    <!-- button -->
                    <div class="button">
                        <button type="submit">
                            حذف الحساب
                        </button>
                    </div>
                    @endguest


                </div>
            </div>
        </div>
        <!--  -->
        <div class="full_page">
            <div class="max_width991">
                <div class="container">
                    <a class="angle" href="{{url('/')}}">
                        <i class="fa-regular fa-angle-right"></i>
                    </a>
                    <div class="row">

                        @guest
                            <div class="col-12">
                                <div class="returnLogin">
                                    <a href="{{url('/login')}}">
                                        <span> يرجي تسجيل الدخول من هنا </span> <i class="fa-regular fa-arrow-left"></i>
                                    </a>
                                </div>
                            </div>
                    @else
                        <!-- dropify -->
                            <form action="{{route('update-profile')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="img">
                                    <img src="{{$user_data->data()['avatar']}}" alt="">
                                </div>
                                <div class="col-12">
                                    <div class="Uplod">
                                        <input type="file" class="dropify" name="avatar">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label for="firstName" class="label label-primary">First Name</label>

                                    <input type="text" value="{{$user_data->data()['firstName']}}" class="form-control"
                                           placeholder="" name="firstName" id="firstName">
                                </div>
                                <div class="col-12">

                                    <label for="lastName" class="label label-primary">last Name</label>

                                    <input type="text" value="{{$user_data->data()['lastName']}}" class="form-control"
                                           placeholder="" name="lastName" id="lastName">
                                </div>
                                <div class="col-12">
                                    <label for="lastName" class="label label-primary">Phone Number</label>
                                    <label class="form-control"> {{$user_data->data()['phoneNumber']}}</label>
                                </div>
                                <div class="col-12">
                                    <div class="langue">
                                        <button type="submit" class="btn btn-success bg-success">
                                            تعديل البيانات
                                        </button>
                                    </div>
                                </div>
                            </form>
                    @endguest
                    <!--langue  -->
                        <div class="col-12">
                            <div class="langue">
                                <select name="" class="select" id="">
                                    <option value="" selected>اللغة</option>
                                    <option value="">العربية</option>
                                    <option value="">الانجليزية</option>
                                </select>
                            </div>
                        </div>
                        <!-- button -->
                        <div class="col-12">
                            <div class="button">
                                <button type="submit">
                                    حذف الحساب
                                </button>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        </div>

    </section>
    <script src="{{asset('/assets/front/')}}/js/popper.min.js"></script>
    <script src="{{asset('/assets/front/')}}/js/dropify.min.js"></script>
    <script src="{{asset('/assets/front/')}}/js/intlTelInput.min.js"></script>
    <script src="{{asset('/assets/front/')}}/js/utils.js"></script>
@endsection
@section('js')

    <script>


    </script>
@endsection

