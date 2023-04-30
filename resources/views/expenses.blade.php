@extends('layouts.app')

@section('content')
   
  {{-- @php
    $currentMonth = \Carbon\Carbon::now()->startOfMonth();
    $twoYearsFromNow = \Carbon\Carbon::now()->addYears(2)->startOfMonth();   
  @endphp
    @for ( $date = $currentMonth; $date <= $twoYearsFromNow; $date->addMonth())
        {{ $date->format('F Y')  }} <br>
    @endfor --}}
    <section class="" >
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
              <div class="card" id="list1" style="border-radius: .75rem; background-color: #eff1f2;">
                <div class="card-body py-4 px-4 px-md-5">
      
                  <p class="h1 text-center mt-3 mb-4 pb-3 text-primary">
                    <i class="fas fa-check-square me-1"></i>
                    <u>مصاريفى</u>
                  </p>
      
                  <div class="pb-2">
                    <div class="card">
                      <div class="card-body">
                    <form action="{{ route('expenses.store') }}" method="post">
                        @csrf
                        <div class="d-flex flex-row align-items-center">
                            <input type="text" required class="form-control form-control-lg" name="name" id="exampleFormControlInput1"
                              placeholder="الاسم">
                              <input type="number" step="any" required  name="money" class="form-control form-control-lg" id="exampleFormControlInput1"
                              placeholder="القيمه">
                              <select class="form-select form-control-lg w-75" name="type">
                                  <option value="2">
                                      مصروف
                                  </option>
                                      <option value="1">
                                              ايراد
                                      </option>
                                      
                              </select>
                            <div>
                              <button type="submit" class="btn btn-primary">اضافه</button>
                            </div>
                          </div>
                    </form>
                        
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section >
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
              <div class="card" id="list1" style="border-radius: .75rem; background-color: #eff1f2;">
                <div class="card-body py-4 px-4 px-md-5">
                    @php
                        $total = 0;    
                    @endphp
                  @foreach ($data as $item )
                     @php
                                 $total += $item->type == 2 ? $item->money * -1 :  $item->money;    
                        @endphp
                      <ul class="list-group list-group-horizontal rounded-0">
                      
                        <li
                          class="list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0 bg-transparent">
                          <p class="lead fw-normal mb-0">{{ $item->title }}</p>
                        </li>
                        <li class="list-group-item px-3 py-1 d-flex align-items-center border-0 bg-transparent">
                            <div
                              class="py-2 px-3 me-2 border border-warning rounded-3 d-flex align-items-center bg-light">
                              <p class="small mb-0">
                                <a href="#!" data-mdb-toggle="tooltip" title="Due on date">
                                  <i class="fas fa-hourglass-half me-2 text-warning"></i>
                                </a>
                                {{ \Carbon\Carbon::parse($item->created_at)->translatedFormat('l j F Y H:i:s') }}
                               
                              </p>
                            </div>
                          </li>

                        <li class="list-group-item px-3 py-1 d-flex align-items-center border-0 bg-transparent">
                          <div
                            class="py-2 px-3 me-2 border {{ $item->type == 2 ? 'border-danger' : 'border-warning' }} rounded-3 d-flex align-items-center bg-light">
                            <p class="small mb-0">
                              <a href="#!" data-mdb-toggle="tooltip" title="Due on date">
                                <i class="fas fa-hourglass-half me-2  "></i>
                              </a>
                              {{ $item->money }}
                            </p>
                          </div>
                        </li>
                        
                    
                    </ul>
                    <hr>
                    

                  @endforeach
                   
                    <ul class="list-group list-group-horizontal rounded-0">
                      
                        <li
                          class="list-group-item px-3 py-1 d-flex align-items-center flex-grow-1 border-0 bg-transparent">
                          <p class="lead fw-normal mb-0">الاجمالى</p>
                        </li>
                       
                        <li class="list-group-item px-3 py-1 d-flex align-items-center border-0 bg-transparent">
                          <div
                            class="py-2 px-3 me-2 border {{ $total < 1 ?  'border-danger' : 'border-warning '}} rounded-3 d-flex align-items-center bg-light">
                            <p class="small mb-0">
                              <a href="#!" data-mdb-toggle="tooltip" title="Due on date">
                                <i class="fas fa-hourglass-half me-2 text-warning"></i>
                              </a>
                              {{  $total < 1 ? $total * -1 : $total }}
                            </p>
                          </div>
                        </li>
                    
                    </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      @endsection