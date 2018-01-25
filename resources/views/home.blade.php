@extends('layouts.app')

@section('content')
<?php header("Refresh: 20;url=http://localhost:".$_SERVER['SERVER_PORT']."/skipnext"); ?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div id="myInstance">
                <div class="circlebar" 
                    data-circle-startTime="0" 
                    data-circle-maxValue="20" 
                    data-circle-dialWidth="10"
                    data-circle-triggerPercentage="false"
                    data-circle-size="100px" 
                    data-circle-type="timer">
                    <div class="loader-bg">
                        <div class="text">00</div>
                    </div>
                </div>
            </div>
            <!-- <span id="timer">Timer: 20</span> -->
        </div>
        <div class="col-md-1"><span>Your Current Score: {{$ses_score}}</span></div>
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Question {{$qno}}</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{$question->question}}
                </div>

                <div class="panel-heading">Enter Your Answer</div>
                <div class="panel-body">

                    <form method="POST" action="{{url('/next')}}">
                        {{csrf_field()}}
                        <input type="hidden" name="qid" value="{{$question->id}}">
                        <input name="answer" type="text" class="form-control"><br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a href="{{url('/skipnext')}}">skip</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
