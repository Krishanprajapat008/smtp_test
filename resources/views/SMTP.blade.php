@extends('layout.layout')

@section('content')

<section>
        <div class="container" style="padding-top:30px">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-9" style="width:300px; height:50px;background-color:#004080;">
                </div>
            </div>
        </div> 
        <div class="container">
            <div class="row">
                <div class="col-sm-2" style="height:600px; background-color:#000d1a; padding-top:10px">
                    <h6><a href="#"><i class="far fa-id-card"> SMTP</i></a></h6>
                    <h6><a href="/email"><i class="far fa-share"> Send Mail</i></a></h6>                 
                </div>
                
                <div class="col-sm-9" style="padding:20px 0px 0px 20px">
                    <form action="{{route('send-email')}}" method="post">
                        @csrf 

                        @if(Session::has('Success'))
                            <div class="alert alert-success">
                                {{Session::get('Success')}}
                            </div>
                        @endif 
                        
                        <input type="text" name="mail" class="form-control" value="SMTP Information" readonly>
                        <div class="form-group-sm">
                            <label for="mail">Site Name <sup>*</sup> :</label>
                            <input type="text" name="site_name" class="form-control form-control-sm" value="{{old('site_name')}}">
                            <span>@error ('site_name') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group-sm">
                            <label for="subject">SMTP Driver <sup>*</sup> :</label>
                            <input type="text" name="smtp_driver" class="form-control form-control-sm" value="{{old('site_name')}}">
                            <span>@error ('smtp_driver') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group-sm">
                            <label for="content">SMTP Host <sup>*</sup> :</label>
                            <input type="text" name="smtp_host" class="form-control form-control-sm" value="{{old('site_name')}}">
                            <span>@error ('smtp_host') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group-sm">
                            <label for="mail">SMTP Port <sup>*</sup> :</label>
                            <input type="text" name="smtp_port" class="form-control form-control-sm" value="{{old('site_name')}}">
                            <span>@error ('smtp_port') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group-sm">
                            <label for="subject">Username <sup>*</sup> :</label>
                            <input type="text" name="username" class="form-control form-control-sm" value="{{old('site_name')}}">
                            <span>@error ('username') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group-sm">
                            <label for="content">SMTP Password <sup>*</sup> :</label>
                            <input type="password" name="smtp_password" class="form-control form-control-sm">
                            <span>@error ('smtp_password') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group-sm">
                            <label for="content">From Name <sup>*</sup> :</label>
                            <input type="text" name="from_name" class="form-control form-control-sm" value="{{old('site_name')}}">
                            <span>@error ('from_name') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group-sm">
                            <label for="content">SMTP Encryption <sup>*</sup> :</label>
                            <select class="form-control form-control-sm" name="smtpEncryption" id="smtpEncryption">
                                <option value="TLS">TLS</option>
                                <option value="SSL">SSL</option>                               
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="content">From Email <sup style="color:red">*</sup> :</label>
                            <input type="email" name="from_email" class="form-control form-control-sm" value="{{old('site_name')}}">
                            <span>@error ('from_email') {{$message}} @enderror</span>
                        </div>
                        <div class="text-center">
                        <input type="submit" class="btn btn-primary" value="Save">
                        </div>
                    </form><br>
                    <div class="text-center" style="background-color:#e1e1d0">
                        <h6>COPYRIGHT &copy; 2020 MailConfig. All rights Reserved.</h6>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection