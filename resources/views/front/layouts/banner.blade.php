<section class="filterPage">
    <div class="container">
        <div class="filterDiv">
            <h3>
                فلترة
            </h3>
            <!-- checkedRadio -->
            <div class="checkedRadio">
                <div class="storChecked">
                    <input type="radio" name="storChecked" id="">
                    <label for="">
                        متاجر
                    </label>
                </div>
                <div class="storChecked">
                    <input type="radio" name="storChecked" id="">
                    <label for="">
                        منتجات
                    </label>
                </div>

            </div>
            <!--  -->
            <div class="checkToggleAll">
                <!-- checkToggle - 1 -->
                <div class="checkToggle">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="CheckedPages">
                        <label class="form-check-label" for="CheckedPages">
                            صفحات فقط
                        </label>
                    </div>
                </div>
                <!-- checkToggle - 2 -->
                <div class="checkToggle">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" id="CheckedPages1">
                        <label class="form-check-label" for="CheckedPages1">
                            متاجر رياضية فقط
                        </label>
                    </div>
                </div>
            </div>
            <!--  -->
            <div class="filterSelect">
                <!-- filterSelect1 -->
                <div class="filterSelect1">
                    <p>
                        المحافظة:
                    </p>
                    <select name="" class="select" id="">
                        <option value="" selected>بغداد</option>

                    </select>
                </div>
                <!-- filterSelect2 -->
                <div class="filterSelect1">
                    <p>
                        الاقسام:
                    </p>
                    <select name="" class="select" id="">
                        <option value="" selected>بغداد</option>

                    </select>
                </div>
            </div>
            <!--  -->
            <div class="button">
                <button>
                    متابعة
                </button>
                <button class="deleteAll">
                    الغاء
                </button>
            </div>
        </div>
    </div>
</section>



<section class="banner">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            <!-- slide1 -->
            <div class="swiper-slide">
                <img src="{{asset('/assets/front/')}}/img/banner/88.webp" alt="">
            </div>
            <!-- slide2 -->
            <div class="swiper-slide">
                <img src="{{asset('/assets/front/')}}/img/banner/88.webp" alt="">
            </div>
            <!-- slide3 -->
            <div class="swiper-slide">
                <img src="{{asset('/assets/front/')}}/img/banner/88.webp" alt="">
            </div>
            <!--  -->
        </div>
        <!-- pagination -->
        <div class="swiper-pagination"></div>
    </div>
</section>
