@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

<div class="container">
    <div class="row">
<!--         <div class="col-md-10 col-md-offset-1">
 -->            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <p>You are logged in!</p>

                    @if (Auth::user()->is_admin)
                        <div class="container-fluid " >
                            <div class="icons">
                                <a href="{{ url('admin/tickets') }}"" class="thumbnail">
                                   <img src="bill.png" ><p class=text-center>See all tickets</p>
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="container-fluid " >
                              <div class="icons">
                                <a href="{{ url('my_tickets') }}"" class="thumbnail">
                                  <img src="bill.png" ><p class=text-center>My tickets</p>
                                </a>
                              </div>

                              <div class="icons">
                                <a href="{{ url('new_ticket') }}"" class="thumbnail">
                                  <img src="edit.png" ><p class=text-center>Open new ticket</p>
                                </a>
                              </div>
                            
                        </div>
                    @endif
                </div>
            </div>
<!--         </div>
 -->    </div>
</div>
@endsection