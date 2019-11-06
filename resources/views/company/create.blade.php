@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @if(empty(Auth::user()->company->logo))
                    <img style="width: 100%" src="{{asset('avatar/apple.png')}}" width="100" height="200">
                @else
                    <img style="width: 100%" src="{{asset('uploads/avatar')}}/{{Auth::user()->company->logo}}" width="100" height="200">
                @endif

                <form enctype="multipart/form-data" action="{{route('company.logo')}}" method="post">
                    @csrf
                    <br>
                    <div class="card">
                        <div class="card-header">Change Your Company Chobi</div>
                        <div class="card-body">
                            <input name="logo" type="file" class="form-control">
                            <br>
                            <button class="btn btn-secondary">Update</button>
                        </div>
                        @if($errors->has('logo'))
                            <div class="error" style="color:red">
                                {{$errors->first('logo')}}
                            </div>
                        @endif
                    </div>
                </form>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">Update Your Information</div>
                    <form action="{{route('company.store')}}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>Address</label>
                                <textarea class="form-control" rows="3" name="address">

                            </textarea>
                            </div>
                            @if($errors->has('address'))
                                <div class="error" style="color:red">
                                    {{$errors->first('address')}}
                                </div>
                            @endif

                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="phone" class="form-control">
                            </div>
                            @if($errors->has('phone'))
                                <div class="error" style="color:red">
                                    {{$errors->first('phone')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Website</label>
                                <input type="text" name="website" class="form-control">
                            </div>
                            @if($errors->has('website'))
                                <div class="error" style="color:red">
                                    {{$errors->first('website')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Slogan</label>
                                <input type="text" name="slogan" class="form-control">
                            </div>
                            @if($errors->has('slogan'))
                                <div class="error" style="color:red">
                                    {{$errors->first('slogan')}}
                                </div>
                            @endif
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" rows="3" name="description">

                            </textarea>
                            </div>
                            @if($errors->has('description'))
                                <div class="error" style="color:red">
                                    {{$errors->first('description')}}
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
                    <div class="card-header">Company Description</div>
                    <div class="card-body">
                        <p><b>Company Name:</b> {{Auth::user()->company->cname}}</p>
                        <p><b>Email:</b> {{Auth::user()->email}}</p>
                        <p><b>Address:</b> {{Auth::user()->company->address}}</p>
                        <p><b>Phone:</b> {{Auth::user()->company->phone}}</p>
                        <p><b>Website:</b> {{Auth::user()->company->website}}</p>
                        <p><b>Company Page:</b> <a href="company/{{Auth::user()->company->slug}}">View</a></p>
                        <p><b>Slogan:</b> {{Auth::user()->company->slogan}}</p>
                        <p><b>Description:</b> {{Auth::user()->company->description}}</p>
                    </div>
                </div>
                <form enctype="multipart/form-data" action="{{route('company.coverphoto')}}" method="post">
                    @csrf
                    <div class="card">
                        <div class="card-header">Update Your Cover Photo</div>
                        <div class="card-body">
                            <input name="cover_photo" type="file" class="form-control">
                            <br>
                            <button class="btn btn-primary">Update</button>
                        </div>
                        @if($errors->has('cover_photo'))
                            <div class="error" style="color:red">
                                {{$errors->first('cover_photo')}}
                            </div>
                        @endif
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
