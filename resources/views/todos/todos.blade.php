@extends('layouts.master')

@section('content')



<main class="profile-page" id="test">
    <section class="section-profile-cover section-shaped my-0">
      <!-- Circles background -->
      <div class="shape shape-style-1 shape-primary alpha-4">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
      </div>
      <!-- SVG separator -->
      <div class="separator separator-bottom separator-skew">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </section>
    <section class="section">
      <div class="container">
        <div class="card card-profile shadow mt--300">
          <div class="px-4">
            <div class="row justify-content-center">
              <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">
                  <a href="#">
                    <img src="/assets/img/theme/default.jpg" class="rounded-circle">
                  </a>
                </div>
              </div>
              <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
                <div class="card-profile-actions py-4 mt-lg-0">
                  <button  class="btn btn-md btn-info btn-block" @click="open=true">Add new</button>
               
                </div>
              </div>
              <div class="col-lg-4 order-lg-1">
                <div class="card-profile-stats d-flex justify-content-center">
                  <div>
                    <span class="heading">Left</span>
                    <span class="description">@{{numberCount.left}}</span>
                  </div>
                  <div>
                    <span class="heading">Completed</span>
                    <span class="description">@{{numberCount.completed}}</span>
                  </div>
                  <div>
                    <span class="heading">All</span>
                    <span class="description">@{{numberCount.all}}</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-center mt-5">
              <h3>{{Auth::user()->name}}
              </h3>
              <div class="h6 font-weight-300"><i class="ni location_pin mr-2"></i>{{ date('Y-m-d') }}</div>

            </div>
            <div class="mt-5 py-5 border-top text-center">
              <div class="row justify-content-center">
                <div v-if="open"class="col-lg-9">
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group">
                             <input type="text" class="form-control form-control-alternative" name="todo" placeholder="todo..." v-model="todo.todo">
                             </div>
                          </div>
                          <div class="col-md-4">
                            <button type="button" class="btn btn-info" @click="addTodo">Add</button>
                            <button type="button" class="btn btn-danger" @click="open=false"> close </button>
                          </div>
          
                </div>
              </div>
            </div>
            <div class="mt-5 py-5 border-top text-center">
              <div class="row justify-content-center">
                <div class="col-lg-9">
                   
                    <div class="row" v-for="todo in todos">
                        <div class="col-sm-8">
                          <div class="row">
                            <div class="col-md-10">
                                <h3>@{{todo.todo}}</h3>
                            </div>
                            <div class="col-md-2">
                                <span v-if="todo.is_completed" class="badge badge-success">Compeleted</span>
                            </div>
                          </div>
                          
                        
                        </div>
                        <div class="col-sm-4">
                          <button v-if="todo.is_completed"  type="button" class="btn btn-success btn-sm" disabled>Mark Completed</button>
                          <button v-else="todo.is_completed" type="button" class="btn btn-success btn-sm" @click="markCompleted(todo)">Mark Completed</button>
                          <button type="button" class="btn btn-danger btn-sm" @click="deleteTodo(todo)"> x </button>
                        </div>
                      </div> 
                    

          
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  @endsection
  @section('js')
  <script>
      window.laravel = {!! json_encode([
          'csrfToken' => csrf_token(),
          'user_id' => Auth::user()->id,
          'url' => url('/')
      ])!!};
</script>
<script src="{{ asset('js/app.js') }}"></script>
  <script src="/js/vue.js"></script>
  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.8/sweetalert2.all.min.js"></script>
  <script src="/js/methods.js"></script>


  @endsection