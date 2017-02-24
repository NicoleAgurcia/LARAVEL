@extends('layouts.app')

@section('title', $ticket->title)

@section('content')

    <div  class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    #{{ $ticket->ticket_id }} - {{ $ticket->title }}
                </div>

                <div class="panel-body">
                    @include('includes.flash')

                    <div class="ticket-info">
                        <p>{{ $ticket->message }}</p>
                        <p>Categry: {{ $category->name }}</p>
                        <p>
                        @if ($ticket->status === 'Open')
                            Status: <span class="label label-success">{{ $ticket->status }}</span>
                        @else
                            Status: <span class="label label-danger">{{ $ticket->status }}</span>
                        @endif
                        </p>
                        <p>Created on: {{ $ticket->created_at->diffForHumans() }}</p>
                    </div>

                    <hr>

                    <div class="comments">
                        @foreach ($comments as $comment)
                            <div class="panel panel-@if($ticket->user->id === $comment->user_id) {{"default"}}@else{{"success"}}@endif">
                                <div class="panel panel-heading">
                                    {{ $comment->user->name }}
                                    <span class="pull-right">{{ $comment->created_at->format('Y-m-d') }}</span>
                                </div>

                                <div class="panel panel-body">
                                    {{ $comment->comment }}     
                                </div>
                            </div>
                        @endforeach
                    </div>

                <div class="comment-form">
                    <form action="{{ url('comment') }}" method="POST" class="form">
                        {!! csrf_field() !!}

                        <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                        <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                            <textarea rows="10" id="comment" class="form-control" name="comment"></textarea>
                            @if ($errors->has('comment'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('comment') }}</strong>
                                </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>


<!--     <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Text Editor</h3>
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fa fa-minus"></i></button>                           
              </div>
            </div>

            <div class="box-body pad">
              <form action="{{ url('comment') }}" method="POST" class="form">
                {!! csrf_field() !!}
                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                 
                  <div class="form-group{{ $errors->has('comment') ? ' has-error' : '' }}">
                    <textarea id="editor1" name="comment" rows="10" cols="80" class="form-control" ></textarea>
                    @if ($errors->has('comment'))
                      <span class="help-block">
                        <strong>{{ $errors->first('comment') }}</strong>
                      </span>
                    @endif
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
              
              </form>
            </div>
          </div>         
        </div>
      </div>
    </section> -->



            </div>
        </div>
    </div>
   <!--  <script src="/vendor/jQuery/jquery-2.2.3.min.js"></script>

    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script> -->
<!-- Bootstrap WYSIHTML5 -->
<!-- <script src="/vendor/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
 -->
@endsection