@extends('layout.layout')

@section('content')

<section>
        <div class="container" style="padding-top:30px">
            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-9" style="width:500px; height:50px;background-color:#004080;">
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-2" style="height:500px; background-color:#000d1a; padding-top:10px">

                    <h6><a href="/SMTP"><i class="far fa-id-card"> SMTP</i></a></h6>
                    <h6><a href="#"><i class="far fa-share"> Send Mail</i></a></h6>
                    
                </div>
                <div class="col-sm-9" style="padding:20px 0px 0px 20px">
                    <form action="{{route('sendmail')}}" method="post">
                        @csrf 

                        @if(Session::has("success"))
                            <div class="alert alert-success alert-dismissible"><button type="button" class="close">&times;</button>{{Session::get('success')}}</div>
                        @elseif(Session::has("failed"))
                            <div class="alert alert-danger alert-dismissible"><button type="button" class="close">&times;</button>{{Session::get('failed')}}</div>
                        @endif


                        <input type="text" name="mail" class="form-control" value="Send Mail Form" readonly>
                        <div class="form-group">
                            <label for="mail">To Mail <sup>*</sup> :</label>
                            <input type="text" name="email" class="form-control">
                            <span>@error ('email') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject <sup>*</sup> :</label>
                            <input type="text" name="subject" class="form-control">
                            <span>@error ('subject') {{$message}} @enderror</span>
                        </div>
                        <div class="form-group">
                            <label for="content">Content <sup>*</sup> :</label>
                            <textarea name="content" class="form-control"></textarea>
                            <span>@error ('content') {{$message}} @enderror</span>
                        </div>
                        <div class="text-center">
                            <input type="submit" class="btn btn-primary ml-4" value="Send Mail">
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