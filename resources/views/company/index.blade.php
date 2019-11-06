@extends('layouts.app')

@section('content')
    <div class="container">
       <div class="row">
           <div class="company-profile">
               @if(empty(Auth::user()->company->cover_photo))
                   <img style="width: 100%" src="{{asset('avatar/apple.png')}}" width="100" height="200">
               @else
                   <img style="width: 100%" src="{{asset('uploads/cover')}}/{{Auth::user()->company->cover_photo}}"  height="300">
               @endif
           </div>
           <div class="company-desc"><br>
               @if(empty(Auth::user()->company->logo))
                   <img style="width: 100%" src="{{asset('avatar/apple.png')}}" width="100" height="200">
               @else
                   <img src="{{asset('uploads/avatar')}}/{{Auth::user()->company->logo}}" width="100" height="200">
               @endif
               <h1>{{$company->cname}}</h1>
               <p>{{$company->description}}</p>
               <p><b>Slogan : {{$company->slogan}}</b></p>
               <p><b>Address : {{$company->address}}</b></p>
               <p><b>Phone : {{$company->phone}}</b></p>
               <p><b>Website : {{$company->website}}</b></p>
           </div>
           <table class="table">
               <thead>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
               <th></th>
               </thead>
               <tbody>
               @foreach($company->jobs as $job)
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
@endsection
