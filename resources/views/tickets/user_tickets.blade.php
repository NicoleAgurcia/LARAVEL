 
@extends('layouts.app')

@section('title', 'My Tickets')

@section('content')
  <section class="content">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">My Tickets</h3>
          </div>
          <div class="box-body">
            @if ($tickets->isEmpty())
              <p>You have not created any tickets.</p>
            @else
              <table class="table table-bordered">
                <tr>
                 <!--  <th style="width: 10px">#</th>
                  <th>Task</th>
                  <th>Progress</th>
                  <th style="width: 40px">Label</th>-->
                  <th>Category</th>
                  <th>Title</th>
                  <th>Status</th>
                  <th style="width: 20%">Last Updated</th>
                </tr>
                @foreach ($tickets as $ticket)
                  <tr>
                    <td>
                    @foreach ($categories as $category)
                      @if ($category->id === $ticket->category_id)
                        {{ $category->name }}
                      @endif
                    @endforeach
                    </td>
                    <td>
                      <a href="{{ url('tickets/'. $ticket->ticket_id) }}">
                        #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                      </a>
                    </td>
                    <td>
                    @if ($ticket->status === 'Open')
                      <span class="btn btn-block btn-success btn-xs">{{ $ticket->status }}</span>
                    @else
                      <span class="btn btn-block btn-danger btn-xs">{{ $ticket->status }}</span>
                    @endif
                    </td>
                    <td>{{ $ticket->updated_at }}</td>
                  </tr>
                @endforeach  
              </table>
              {{ $tickets->render() }}
            @endif
          </div>
      </div>
    </div>
  </section>
@endsection
