@extends('layouts.master')
@section('content')
<main>
    <div class="position-relative">
      <!-- shape Hero -->
      <section class="section section-lg section-shaped pb-250">
        <div class="shape shape-style-1 shape-default">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <span></span>
        </div>
        <div class="container py-lg-md d-flex">
          <div class="col px-0">
            <div class="row">
              <div class="col-lg-6">
                <h1 class="display-3  text-white">A simple Todo app SPA
                  <span>Laravel 5.7 | vuejs2 | Argo design system/bootstrap4</span>
                </h1>
                <p class="lead  text-white">Authentication system with profile pictures , input validation front with vuejs2 and back with laravel , sweetalert for alerts</p>
               
                @if(Auth::check())
                <div class="btn-wrapper">
                    <a href="{{url('/todo')}}"><button type="button" class="btn btn-info">Launch application</button></a> 
                  </a>
                </div>
                @else
                <div class="btn-wrapper">
                   <a href="{{url('/login')}}"><button type="button" class="btn btn-info">Login</button></a> 
                    <a href="{{url('/register')}}"><button type="button" class="btn btn-secondary">Sign up</button></a> 
                  </a>
                </div>
                @endif
               


              </div>
            </div>
          </div>
        </div>
        <!-- SVG separator -->
        <div class="separator separator-bottom separator-skew">
          <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
            <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
          </svg>
        </div>
      </section>
      <!-- 1st Hero Variation -->
    </div>
  </main>

  @endsection