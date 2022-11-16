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
    <section class="addStor">
        <div class="container">
            <!-- min-width 991px -->
            <div class="min_width991">
                <div class="container">
                    <div class="row">
                        <!-- dropify -->
                        <div class="col-12">
                            <div class="Uplod">
                                <input type="file" class="dropify1">
                                <div class="Uplod2">
                                    <input type="file" class="dropify">
                                </div>
                            </div>
                        </div>
                        <!-- name -->
                        <div class="col-12">
                            <div class="name">
                                <input type="text" placeholder="اسم المتجر">
                            </div>
                        </div>
                        <!-- checked -->
                        <div class="col-12">
                            <div class="checkedAll">
                                <div class="checked">
                                    <div class="form-check form-switch">

                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault">
                                        <!-- <label class="form-check-label" for="flexSwitchCheckDefault"></label> -->
                                    </div>
                                    <p>
                                        ليس لدي متجر للبيع المباشر (توصيل فقط).
                                    </p>
                                </div>
                                <!-- checkedSelect -->

                                <div class="checkedAll2 active">
                                    <div class="checkedSelect">
                                        <!-- select1 -->

                                        <div class="select1">

                                            <select name="" class="select" onchange="get_cities(this)" id="">
                                                @forelse($governorates as $governorate)
                                                <option cities-data="{{json_encode($governorate->data()['cities'])}}"  value="{{$governorate->data()['name']["name_".app()->getLocale()]}}" selected>{{$governorate->data()['name']["name_".app()->getLocale()]}}</option>
                                                @empty
                                                    <option cities-data="" onchange="" value="" selected>اختار المحافظه</option>
                                                @endforelse
                                            </select>
                                        </div>

                                        <!-- select2 -->

                                        <div class="select2">
                                            <select name=""  class="select districts" id="" >
                                                <option value="" selected >اختر المنطقة</option>


                                            </select>
                                        </div>
                                    </div>
                                    <!-- map -->
                                    <div class="map">
                                        <input type="text" placeholder="اقرب نقطة دالة">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <!-- mapButton -->
                                    <div class="mapButton">
                                        <button>
                                            <i class="fa-solid fa-location-dot"></i> اضف موقعك علي الخريطة
                                        </button>
                                    </div>
                                </div>
                                <!-- checked -->
                                <div class="checked">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" >
                                        <!-- <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label> -->
                                    </div>
                                    <p>
                                        متجري مخصص للملابس الرياضية فقط
                                    </p>
                                </div>
                                <!--  -->
                                <!-- choose coin -->
                                <div class="chooseCoin d-flex align-items-center">
                                    <p>
                                        اختر عملة المتجر:
                                    </p>
                                    <div class="d-flex align-items-center">
                                        <input type="radio" name="IQD" id="">
                                        <P>IQD</P>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        <input type="radio" name="IQD" id="">
                                        <P>USD</P>
                                    </div>
                                </div>
                                <!-- driver -->
                                <div class="driver">
                                    <!-- checked -->
                                    <div class="checked">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="driver" >
                                            <!-- <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label> -->
                                        </div>
                                        <p>
                                            ليس لدي توصيل
                                        </p>
                                    </div>
                                    <!--  -->
                                    <div class="mainCityAll">
                                        <div class="mainCity">
                                            <p>
                                                بغداد:
                                            </p>
                                            <input type="number" class="frist" name="" id="" placeholder="كلفة التوصيل">
                                        </div>
                                        <div class="mainCity">
                                            <p>
                                                باقي المحافظات:
                                            </p>
                                            <input type="number" name="" id="" placeholder="كلفة التوصيل">
                                        </div>
                                    </div>
                                    <!-- BigInput -->
                                    <div class="BigInput">
                                        <div>
                                            <input type="number" placeholder="رقم هاتف متجرك">
                                            <i class="fa-solid fa-phone"></i>
                                        </div>
                                        <div>
                                            <input type="number" placeholder="واتساب">
                                            <i class="fa-brands fa-whatsapp"></i>
                                        </div>
                                        <div>
                                            <input type="text" placeholder="رابط الفبس بوك" >
                                            <i class="fa-brands fa-facebook-f"></i>
                                        </div>
                                        <div>
                                            <input type="text" placeholder="رابط الانستجرام">
                                            <i class="fa-brands fa-instagram"></i>
                                        </div>
                                    </div>
                                    <!--  -->
                                    <!-- mapButton -->
                                    <div class="mapButton">
                                        <button>
                                            التالي
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>
            <!--  -->
            <!-- max_width 991px -->

            <div class="full_page">
                <div class="max_width991">
                    <div class="container">
                        <div class="angle">
                            <div class="angle2">

                                <a class="" href="index.html">
                                    <i class="fa-regular fa-angle-right"></i>
                                </a>
                                <h3>
                                    اضف متجرك
                                </h3>
                            </div>
                        </div>
                        <div class="row">
                            <!-- dropify -->
                            <div class="col-12">
                                <div class="Uplod">
                                    <input type="file" class="dropify1">
                                    <div class="Uplod2">
                                        <input type="file" class="dropify">
                                    </div>
                                </div>
                            </div>
                            <!-- name -->
                            <div class="col-12">
                                <div class="name">
                                    <input type="text" placeholder="اسم المتجر">
                                </div>
                            </div>
                            <!-- checked -->
                            <div class="col-12">
                                <div class="checkedAll">
                                    <div class="checked">
                                        <div class="form-check form-switch">

                                            <input class="form-check-input" type="checkbox" id="checkedAll1">
                                            <!-- <label class="form-check-label" for="flexSwitchCheckDefault"></label> -->
                                        </div>
                                        <p>
                                            ليس لدي متجر للبيع المباشر (توصيل فقط).
                                        </p>
                                    </div>
                                    <!-- checkedSelect -->

                                    <div class="checkedAll2 active">
                                        <div class="checkedSelect">
                                            <!-- select1 -->

                                            <div class="select1">
                                                <select name="" class="select" id="">
                                                    <option value="" selected>بغداد</option>

                                                </select>
                                            </div>

                                            <!-- select2 -->

                                            <div class="select2">
                                                <select name="" class="select" id="" >
                                                    <option value="" selected disabled>اختر المنطقة</option>
                                                    <option value="">الحرية</option>
                                                    <option value="">الدورة</option>
                                                    <option value="">الشعلة</option>
                                                    <option value="">حي العامل</option>
                                                    <option value="">المحمودية</option>
                                                    <option value="">الغزالية</option>
                                                    <option value="">حي الجهاد</option>
                                                    <option value="">البياع</option>
                                                    <option value="">السيدية</option>
                                                    <option value="">اليرموك</option>
                                                    <option value="">حي الاعلام</option>
                                                    <option value="">المنصور</option>
                                                    <option value="">التاجي</option>

                                                </select>
                                            </div>
                                        </div>
                                        <!-- map -->
                                        <div class="map">
                                            <input type="text" placeholder="اقرب نقطة دالة">
                                            <i class="fa-solid fa-location-dot"></i>
                                        </div>
                                        <!-- mapButton -->
                                        <div class="mapButton">
                                            <button>
                                                <i class="fa-solid fa-location-dot"></i> اضف موقعك علي الخريطة
                                            </button>
                                        </div>
                                    </div>
                                    <!-- checked -->
                                    <div class="checked">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" >
                                            <!-- <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label> -->
                                        </div>
                                        <p>
                                            متجري مخصص للملابس الرياضية فقط
                                        </p>
                                    </div>
                                    <!--  -->
                                    <!-- choose coin -->
                                    <div class="chooseCoin d-flex align-items-center">
                                        <p>
                                            اختر عملة المتجر:
                                        </p>
                                        <div class="d-flex align-items-center">
                                            <input type="radio" name="IQD" id="">
                                            <P>IQD</P>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <input type="radio" name="IQD" id="">
                                            <P>USD</P>
                                        </div>
                                    </div>
                                    <!-- driver -->
                                    <div class="driver">
                                        <!-- checked -->
                                        <div class="checked">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="checkedAll2" >
                                                <!-- <label class="form-check-label" for="flexSwitchCheckChecked">Checked switch checkbox input</label> -->
                                            </div>
                                            <p>
                                                ليس لدي توصيل
                                            </p>
                                        </div>
                                        <!--  -->
                                        <div class="mainCityAll">
                                            <div class="mainCity">
                                                <p>
                                                    بغداد:
                                                </p>
                                                <input type="number" class="frist" name="" id="" placeholder="كلفة التوصيل">
                                            </div>
                                            <div class="mainCity">
                                                <p>
                                                    باقي المحافظات:
                                                </p>
                                                <input type="number" name="" id="" placeholder="كلفة التوصيل">
                                            </div>
                                        </div>
                                        <!-- BigInput -->
                                        <div class="BigInput">
                                            <div>
                                                <input type="number" placeholder="رقم هاتف متجرك">
                                                <i class="fa-solid fa-phone"></i>
                                            </div>
                                            <div>
                                                <input type="number" placeholder="واتساب">
                                                <i class="fa-brands fa-whatsapp"></i>
                                            </div>
                                            <div>
                                                <input type="text" placeholder="رابط الفبس بوك" >
                                                <i class="fa-brands fa-facebook-f"></i>
                                            </div>
                                            <div>
                                                <input type="text" placeholder="رابط الانستجرام">
                                                <i class="fa-brands fa-instagram"></i>
                                            </div>
                                        </div>
                                        <!--  -->
                                        <!-- mapButton -->
                                        <div class="mapButton">
                                            <button>
                                                التالي
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>


    <script src="{{asset('/assets/front/')}}/js/dropify.min.js"></script>
    <script src="{{asset('/assets/front/')}}/js/intlTelInput.min.js"></script>
    <script src="{{asset('/assets/front/')}}/js/utils.js"></script>
@endsection
@section('js')

    <script>

        function get_cities(att){
            let json = $(att).val( $(att).attr("placeholder") )
            return false;
            let cities = JSON.parse(data);
            let data = "";
            for (let i = 0; i < cities.length; i++) {
                data +=  "<option value='"+cities[i][name]+"'>"+cities[i][name]+"</option> ";
            }
            $('.districts').html(data);
        }
    </script>
@endsection
