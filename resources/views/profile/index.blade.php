@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @if(empty(Auth::user()->profile->avatar))
                    <img style="width: 100%" src="{{asset('avatar/apple.png')}}" width="100" height="200">
                @else
                    <img style="width: 100%" src="{{asset('uploads/avatar')}}/{{Auth::user()->profile->avatar}}" width="100" height="200">
                @endif

                <form enctype="multipart/form-data" action="{{route('profile.avatar')}}" method="post">
                    @csrf
                    <br>
                    <div class="card">
                        <div class="card-header">Change Your Chobi</div>
                        <div class="card-body">
                            <input name="avatar" type="file" class="form-control">
                            <br>
                            <button class="btn btn-secondary">Update</button>
                        </div>
                        @if($errors->has('avatar'))
                            <div class="error" style="color:red">
                                {{$errors->first('avatar')}}
                            </div>
                        @endif
                    </div>
                </form>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Update Your Information</div>
                    <form action="{{route('profile.store')}}" method="post">
                        @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" rows="3" name="address">
                                {{Auth::user()->profile->address}}
                            </textarea>
                        </div>
                        @if($errors->has('address'))
                            <div class="error" style="color:red">
                                {{$errors->first('address')}}
                            </div>
                        @endif

                        <div class="form-group">
                            <label>Phone Number</label>
                            <textarea class="form-control" rows="3" name="phone_number">
                                {{Auth::user()->profile->phone_number}}
                            </textarea>
                        </div>
                        @if($errors->has('phone_number'))
                            <div class="error" style="color:red">
                                {{$errors->first('phone_number')}}
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Experience</label>
                            <textarea class="form-control" rows="3" name="experience">
                                {{Auth::user()->profile->experience}}
                            </textarea>
                        </div>
                        @if($errors->has('experience'))
                            <div class="error" style="color:red">
                                {{$errors->first('experience')}}
                            </div>
                        @endif
                        <div class="form-group">
                            <label>BIODATA</label>
                            <textarea class="form-control" rows="3" name="bio">
                                {{Auth::user()->profile->bio}}
                            </textarea>
                        </div>
                        @if($errors->has('bio'))
                            <div class="error" style="color:red">
                                {{$errors->first('bio')}}
                            </div>
                        @endif
                        <div class="form-group">
                            <button class="btn btn-warning">Submit</button>
                        </div>
                    </div>
                        @if(Session::has('message'))
                            <div class="alert alert-success">
                                {{Session::get('message')}}
                            </div>
                        @endif
                    </form>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">User Description</div>
                    <div class="card-body">
                        <p><b>Name :</b>{{Auth::user()->name}}</p>
                        <p><b>Email :</b>{{Auth::user()->email}}</p>
                        <p><b>Address :</b>{{Auth::user()->profile->address}}</p>
                        <p><b>Phone Number :</b>{{Auth::user()->profile->phone_number}}</p>
                        <p><b>Experience :</b>{{Auth::user()->profile->experience}}</p>
                        <p><b>Biodata :</b>{{Auth::user()->profile->bio}}</p>
                        <p><b>Member Since :</b>{{date('F d Y', strtotime(Auth::user()->created_at))}}</p>

                        @if(!empty(Auth::user()->profile->cover_letter))
                            <p>
                                <a href="{{Storage::url(Auth::user()->profile->cover_letter)}}">
                                    Cover Letter
                                </a>
                            </p>
                        @else
                            <p>Please Upload Cover Letter!</p>
                        @endif

                        @if(!empty(Auth::user()->profile->resume))
                            <p>
                                <a href="{{Storage::url(Auth::user()->profile->resume)}}">
                                    Resume
                                </a>
                            </p>
                        @else
                            <p>Please Upload Resume!</p>
                        @endif
                    </div>
                </div>
                <form enctype="multipart/form-data" action="{{route('profile.coverletter')}}" method="post">
                    @csrf
                <div class="card">
                    <div class="card-header">Update Your Cover Letter</div>
                    <div class="card-body">
                        <input name="cover_letter" type="file" class="form-control">
                        <br>
                        <button class="btn btn-primary">Update</button>
                    </div>
                    @if($errors->has('cover_letter'))
                        <div class="error" style="color:red">
                            {{$errors->first('cover_letter')}}
                        </div>
                    @endif
                </div>
                </form>
                <form enctype="multipart/form-data" action="{{route('profile.resume')}}" method="post">
                    @csrf
                <div class="card">
                    <div class="card-header">Update Your Resume</div>
                    <div class="card-body">
                        <input name="resume" type="file" class="form-control">
                        <br>
                        <button class="btn btn-secondary">Update</button>
                    </div>
                    @if($errors->has('resume'))
                        <div class="error" style="color:red">
                            {{$errors->first('resume')}}
                        </div>
                    @endif
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
