@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Leader Board</div>

                <div class="panel-body">
                    <table id="task-table-orders" class="table table-borderless m-b-none">
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Highest Score</th> 
                                <th>Player Name</th>
                            </tr>
                        </thead> 
                        <tbody>
                            @foreach($players as $player)
                            <tr>
                                <td style="vertical-align: middle;"><code>{{$loop->iteration}}</code></td>
                                <td style="vertical-align: middle;">{{$player->highscore}}</td> 
                                <td style="vertical-align: middle;">{{$player->name}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
