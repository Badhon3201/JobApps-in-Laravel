@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">All Jobs</div>

                    <div class="card-body">
                        <table class="table">
                            <thead>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            </thead>
                            <tbody>
                            @foreach($jobs as $job)
                                <tr>
                                    <td>
                                        <img width="80" src="{{asset('avatar/apple.png')}}">
                                    </td>
                                    <td>
                                        Position: {{$job->position}}<br>
                                        Job Type: <i class="fa fa-clock"></i>&nbsp;{{$job->type}}

                                    </td>
                                    <td>
                                        <i class="fa fa-map-marker"></i>&nbsp;Address: {{$job->address}}
                                    </td>
                                    <td>
                                        <i class="fa fa-calendar-check"></i>&nbsp;Date: {{$job->created_at->diffForHumans()}}
                                    </td>
                                    <td>
                                        <a href="{{route('jobs.show',[$job->id,$job->slug])}}">
                                            <button class="btn btn-success btn-sm">Apply</button>
                                        </a>
                                    </td>
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
