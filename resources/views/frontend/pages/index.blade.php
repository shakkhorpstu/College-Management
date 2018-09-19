@extends('frontend.layouts.master')

@section('content')

  <section class="hero-section">
    <div class="hero-slider owl-carousel">
      <div class="hs-item set-bg" data-setbg="{{ asset('public/front/img/hero-slider/3.jpg') }}">
        <div class="hs-text">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="hs-subtitle"></div>
                <h2 class="hs-title">Satkhira Govt.College</h2>
                <p class="hs-des"></p>
                <div class=""></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="hs-item set-bg" data-setbg="{{ asset('public/front/img/hero-slider/4.jpg') }}">
        <div class="hs-text">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="hs-subtitle"></div>
                <h2 class="hs-title">Satkhira Govt. College</h2>
                <p class="hs-des"></p>
                <div class=""></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="hs-item set-bg" data-setbg="{{ asset('public/front/img/hero-slider/5.jpg') }}">
        <div class="hs-text">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <div class="hs-subtitle"></div>
                <h2 class="hs-title">Satkhira Govt. College</h2>
                <p class="hs-des"></p>
                <div class=""></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Hero section end -->



  <!-- Services section -->
  <section class="service-section spad">
    <div class="container services">
      <div class="section-title text-center">
        <h3>SERVICES</h3>
        <!--
        <p>We provides the opportunity to prepare for life</p>
      -->
    </div>
    <div class="row">
      <div class="col-lg-4 col-sm-6 service-item">
        <div class="service-icon">
          <img src="{{ asset('public/front/img/services-icons/1.png') }}" alt="1">
        </div>
        <div class="service-content">
          <h4>Admission</h4>
          <p>Admission Circular.</p>
          <p>online from Fillup.</p>
          <p>Admission Result.</p>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 service-item">
        <div class="service-icon">
          <img src="{{ asset('public/front/img/services-icons/2.png') }}" alt="1">
        </div>
        <div class="service-content">
          <h4>Educational Information</h4>
          <p>Class Routine and Others.</p>
          <p>Hsc Cademic Calender.</p>
          <p>Hsc Digital Content.</p>
        </div>
      </div>
      <div class="col-lg-4 col-sm-6 service-item">
        <div class="service-icon">
          <img src="{{ asset('public/front/img/services-icons/3.png') }}" alt="1">
        </div>
        <div class="service-content">
          <h4>Download</h4>
          <p>Govt from download.</p>

          <p>Students related.</p>

          <p>Miscellinious.</p>
        </div>
      </div>

      <div class="col-lg-4 col-sm-6 service-item">
        <div class="service-icon">
          <img src="{{ asset('public/front/img/services-icons/4.png') }}" alt="1">
        </div>
        <div class="service-content">
          <h4>CO-CURRICULAM</h4>
          <p>Sports</p>
          <p>Fltc.</p>
          <p>Rovers and Scouting</p>
          <p>BNCC</p>
        </div>
      </div>


      <div class="col-lg-4 col-sm-6 service-item">
        <div class="service-icon">
          <img src="{{ asset('public/front/img/services-icons/5.png') }}" alt="1">
        </div>
        <div class="service-content">
          <h4>Notice Bord</h4>
          <p>College Notice</p>
          <p>Hons Notice</p>
          <p>E-Content</p>

        </div>
      </div>

</div>
</div>
</section>

@endsection
