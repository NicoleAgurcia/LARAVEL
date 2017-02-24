@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container">
    <div class="row">
      <!--<div class="col-md-10 col-md-offset-1">-->
      <div class="panel panel-default">
<!--         <div class="panel-heading">Dashboard</div>
 -->          <div class="panel-body">
          
            @if (Auth::user()->is_admin)

              <div class="container-fluid " >
                <div class="col-lg-4 col-xs-6">
                  <div class="small-box bg-aqua">
                    <div class="icon">
                      <i class="fa fa-th"></i>
                    </div>
                    <div class="inner" >
                      <h3>{{$All_Tickets}}</h3>
                      <p>All Tickets</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-xs-6">  
                  <div class="small-box bg-red">
                    <div class="icon">
                      <i class="fa  fa-wrench"></i>
                    </div>                 
                    <div class="inner">
                      <h3>{{$opentickets_user}}</h3>
                      <p>Open Ticktes</p>
                    </div>
                  </div>
                </div> 
                <div class="col-lg-4 col-xs-6">
                  <div class="small-box bg-green">
                    <div class="icon">
                      <i class="fa  fa-check-circle "></i>
                    </div>            
                    <div class="inner">
                      <h3>{{$closetickets_user}}</h3>
                      <p>Closed Ticktes</p>
                    </div>
                  </div>
                </div>
     
<!--               <div class="container-fluid " >
                <div class="icons">
                  <a href="{{ url('admin/tickets') }}"" class="thumbnail">
                    <img src="bill.png" ><p class=text-center>See all tickets</p>
                  </a>
                </div>
              </div>
 -->
            </div>
            @else
              <div class="container-fluid " >
                <div class="col-lg-4 col-xs-6" >
                  <div class="small-box bg-aqua">
                    <div class="inner">
                      <h3>{{$All_Tickets}}</h3>
                      <p>All Tickets</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-ticket"></i>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-xs-6">  
                  <div class="small-box bg-green">
                    <div class="inner">
                      <h3>{{$closetickets_user}}</h3>
                      <p>Complete Ticktes</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-check-square-o"></i>
                    </div>                 
                  </div>
                </div> 
                <div class="col-lg-4 col-xs-6">
                  <div class="small-box bg-yellow">
                    <div class="inner">
                      <h3>{{$opentickets_user}}</h3>
                      <p>Pending Ticktes</p>
                    </div>
                    <div class="icon">
                      <i class="fa fa-clock-o"></i>
                    </div>            
                  </div>
                </div>
        <!--     <div class="icons">
              <a href="{{ url('my_tickets') }}"" class="thumbnail">
                <img src="bill.png" ><p class=text-center>My tickets</p>
              </a>
            </div>

            <div class="icons">
              <a href="{{ url('new_ticket') }}"" class="thumbnail">
                <img src="edit.png" ><p class=text-center>Open new ticket</p>
              </a>
            </div> -->

            </div>
                    @endif
                </div>
            </div>
<!--         </div>
 -->    </div>
</div>
@endsection