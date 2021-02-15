<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Job Application</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

  <!-- Styles -->
  <style>
  html, body {
    background-color: #fff;
    color: #636b6f;
    font-family: 'Nunito', sans-serif;
    font-weight: 200;
    height: 100vh;
    margin: 0;
  }

  .btn{
    padding: 6px 5px !important;
  }
  .full-height {
    height: 100vh;
  }

  .flex-center {
    align-items: center;
    display: flex;
    justify-content: center;
  }

  .position-ref {
    position: relative;
  }

  .top-right {
    position: absolute;
    right: 10px;
    top: 18px;
  }

  .col-md-3 {
    width: 23% !important;
  }
  .remove{
    font-size: 10px !important;
  }

  .content {
    text-align: center;
  }

  .title {
    font-size: 84px;
  }

  .links > a {
    color: #636b6f;
    padding: 0 25px;
    font-size: 13px;
    font-weight: 600;
    letter-spacing: .1rem;
    text-decoration: none;
    text-transform: uppercase;
  }

  .m-b-md {
    margin-bottom: 30px;
  }
  .error{
    color:red;font-size: 12px;
  }

</style>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js" integrity="sha512-UdIMMlVx0HEynClOIFSyOrPggomfhBKJE28LKl8yR3ghkgugPnG6iLfRfHwushZl1MOPSY6TsuBDGPK2X4zYKg==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/additional-methods.min.js" integrity="sha512-6Uv+497AWTmj/6V14BsQioPrm3kgwmK9HYIyWP+vClykX52b0zrDGP7lajZoIY1nNlX4oQuh7zsGjmF7D0VZYA==" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js" integrity="sha512-RCgrAvvoLpP7KVgTkTctrUdv7C6t7Un3p1iaoPr1++3pybCyCsCZZN7QEHMZTcJTmcJ7jzexTO+eFpHk4OCFAg==" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css" integrity="sha512-YdYyWQf8AS4WSB0WWdc3FbQ3Ypdm0QCWD2k4hgfqbQbRCJBEgX0iAegkl2S1Evma5ImaVXLBeUkIlP6hQ1eYKQ==" crossorigin="anonymous" />
</head>
<body>
  <div class="position-ref full-height">
    @if (Route::has('login'))
    <div class="top-right links">
      @auth
      <a href="{{ url('/home') }}">Home</a>
      @else
      <a href="{{ route('login') }}">Login</a>

      @endauth
    </div>
    @endif

    <div class="col-md-6">
      <h3>Job Edit</h3>
      @if (count($errors) > 0)
      <div class = "alert alert-danger">
        <ul>
         @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
         @endforeach
       </ul>
     </div>
     @endif

     @if (session('success'))
     <div class="alert alert-success" role="alert">
      {{ session('success') }}
    </div>
    @endif

    @if (session('danger'))
    <div class="alert alert-danger" role="alert">
      {{ session('danger') }}
    </div>
    @endif
    <form class=""  method="POST" action="{{ route('job.update',$job->id) }}" id="job_form" >
      @csrf
      @method('PUT')

      <h4>Basic Info</h4>
      <hr>
      <div class="form-group">
        <label>Name</label>
        <input type="text" name="name" value="{{$job->name}}" class="form-control required">
      </div>
      <div class="form-group">
        <label >Email</label>
        <input type="text" class="form-control required email" value="{{$job->email}}" name="email">
      </div>
      <div class="form-group">
        <label >Contact No</label>
        <input type="text" class="form-control required number" value="{{$job->contact}}" name="contact">
      </div>
      <div class="form-group">
        <label >Address</label>
        <input type="text" class="form-control required" value="{{$job->address}}" name="address">
      </div>
      <div class="form-group">
        <label >Gender</label>
        <input type="radio" class="" name="gender"  {{ $job->gender=='male'?'checked':'' }} value="male">Male
        <input type="radio" class="" name="gender" {{ $job->gender=='female'?'checked':'' }} value="female">Female
      </div>

      <h4>Education details</h4>
      <hr>
      <div class="form-group">
        <label>SSC</label></br>
        <div class="col-md-3">
          <div class="row">
            <input type="text" name="ssc_board" value="{{$job->ssc_board}}" class="form-control  required" placeholder="Board/University">
          </div>
        </div>
        <div class="col-md-3">
          <div class="row">
            <input type="text" name="ssc_year" value="{{$job->ssc_year}}" class="form-control number required" minlength="4" maxlength="4" placeholder="Year">
          </div>
        </div>
        <div class="col-md-3">
          <div class="row">
            <input type="text" name="sss_grade" value="{{$job->sss_grade}}" class="form-control required" placeholder="CGPA/Percentage" >
          </div>
        </div>
      </div>
    </br>
    <div class="form-group">
      <label>HSC</label></br>
      <div class="col-md-3">
        <div class="row">
          <input type="text" name="hsc_board" value="{{$job->hsc_board}}" class="form-control  " placeholder="Board/University">
        </div>
      </div>
      <div class="col-md-3">
        <div class="row">
          <input type="text" name="hsc_year" value="{{$job->hsc_year}}" class="form-control number " minlength="4" maxlength="4" placeholder="Year">
        </div>
      </div>
      <div class="col-md-3">
        <div class="row">
          <input type="text" name="hsc_grade" value="{{$job->hsc_grade}}" class="form-control " placeholder="CGPA/Percentage" >
        </div>
      </div>
    </div>
  </br>
  <div class="form-group">
    <label>Graduation</label></br>
    <div class="col-md-3">
      <div class="row">
        <input type="text" name="graduation_board" value="{{$job->graduation_board}}" class="form-control  " placeholder="Board/University">
      </div>
    </div>
    <div class="col-md-3">
      <div class="row">
        <input type="text" name="graduation_year" value="{{$job->graduation_year}}" class="form-control number " minlength="4" maxlength="4" placeholder="Year">
      </div>
    </div>
    <div class="col-md-3">
      <div class="row">
        <input type="text" name="graduation_grade" value="{{$job->graduation_grade}}" class="form-control " placeholder="CGPA/Percentage" >
      </div>
    </div>
  </div>
</br>
<div class="form-group">
  <label>Master Degree</label></br>
  <div class="col-md-3">
    <div class="row">
      <input type="text" name="degree_board" class="form-control" value="{{$job->degree_board}}"  placeholder="Board/University">
    </div>
  </div>
  <div class="col-md-3">
    <div class="row">
      <input type="text" name="degree_year" class="form-control number "  value="{{$job->degree_year}}"  minlength="4" maxlength="4" placeholder="Year">
    </div>
  </div>
  <div class="col-md-3">
    <div class="row">
      <input type="text" name="degree_grade" class="form-control "  value="{{$job->degree_grade}}"  placeholder="CGPA/Percentage" >
    </div>
  </div>
</div>

</br>

<h4>Work Experience</h4>
<hr>

<div id="work_exp">

  @php 
  $experinces = json_decode($job->experience);
  @endphp

  @foreach($experinces as $exp)
  <div class="form-group work_exp " >

    <div class="col-md-3">
      <div class="row">
        <input type="text" name="experience[company_name][]"  value="{{$exp->company_name}}"  placeholder="Company"> 
      </div>
    </div>
    <div class="col-md-3">
      <div class="row">
        <input type="text" name="experience[designation][]" value="{{$exp->designation}}"   placeholder="Designation"> 
      </div>
    </div>
    <div class="col-md-3">
      <div class="row">
       <input type="date" name="experience[from][]"  value="{{$exp->from}}" placeholder="From" class="datepick" autocomplete="off"> 
     </div>
   </div>
   <div class="col-md-3">
    <div class="row">
     <input type="date" name="experience[to][]" value="{{$exp->to}}"  placeholder="To" class="datepick" autocomplete="off">
     <button class="btn btn-danger remove" type="button">X</button>
   </div>
 </div>

</div>

@endforeach

</div>
</br>
<div class="input-group-btn"> 
  <button class="btn btn-success add-more" type="button"><i class="glyphicon glyphicon-plus"></i> Add More</button>
</div>
</br>

<h4>Known Languages</h4>
<hr>
@php
$languages = json_decode($job->languages);
@endphp


<div class="form-group">
  <div class="col-md-3">
    <div class="row">
      <input type="checkbox" name="languages[hindi]" id="hindi" {{ isset($languages->hindi) ?"checked":"" }} placeholder="Board/University"> Hindi
    </div>
  </div>
  <div class="col-md-3">
    <div class="row">
      <input type="checkbox" name="languages[hindi][]" class="hindi required"  {{ isset($languages->hindi) && in_array('Read',$languages->hindi)?"checked":"" }} {{ isset($languages->hindi) ?"":'disabled=""' }}  value="Read"> Read
    </div>
  </div>
  <div class="col-md-3">
    <div class="row">
      <input type="checkbox" name="languages[hindi][]" class="hindi required" {{isset($languages->hindi) &&  in_array('Write',$languages->hindi)?"checked":"" }}  {{ isset($languages->hindi) ?"":'disabled=""' }}  value="Write"> Write
    </div>
  </div>
  <div class="col-md-3">
    <div class="row">
      <input type="checkbox" name="languages[hindi][]" class="hindi required" {{ isset($languages->hindi) &&  in_array('Speak',$languages->hindi)?"checked":"" }}  {{ isset($languages->hindi) ?"":'disabled=""' }}  value="Speak" > Speak
    </div>
  </div>
</div>
</br>


<div class="form-group">
  <div class="col-md-3">
    <div class="row">
      <input type="checkbox" id="gujarati"  name="languages[gujarati]" {{ isset($languages->gujarati) ?"checked":"" }}> Gujarati
    </div>
  </div>
  <div class="col-md-3">
    <div class="row">
      <input type="checkbox" class="gujarati required" name="languages[gujarati][]"  {{ isset($languages->gujarati) &&  in_array('Read',$languages->gujarati)?"checked":"" }} {{ isset($languages->hindi) ?"":'disabled=""' }} value="Read"> Read
    </div>
  </div>
  <div class="col-md-3">
    <div class="row">
      <input type="checkbox"  class="gujarati required" name="languages[gujarati][]"  {{ isset($languages->gujarati) &&  in_array('Write',$languages->gujarati)?"checked":"" }}  {{ isset($languages->hindi) ?"":'disabled=""' }} value="Write" > Write
    </div>
  </div>
  <div class="col-md-3">
    <div class="row">
      <input type="checkbox" class="gujarati required" name="languages[gujarati][]"  {{ isset($languages->gujarati) &&  in_array('Speak',$languages->gujarati)?"checked":"" }}  {{ isset($languages->hindi) ?"":'disabled=""' }} value="Speak"> Speak
    </div>
  </div>
</div>



<div class="form-group">
  <div class="col-md-3">
    <div class="row">
      <input type="checkbox" id="english"   name="languages[English]" {{ isset($languages->English) ?"checked":"" }}> English
    </div>
  </div>
  <div class="col-md-3">
    <div class="row">
      <input type="checkbox" class="english required" name="languages[English][]" {{ isset($languages->English) && in_array('Read',$languages->English)?"checked":"" }}  {{ isset($languages->English) ?"":'disabled=""' }}  value="Read" > Read
    </div>
  </div>
  <div class="col-md-3">
    <div class="row">
      <input type="checkbox" class="english required"  name="languages[English][]"  {{ isset($languages->English) &&  in_array('Write',$languages->English)?"checked":"" }}  {{ isset($languages->English) ?"":'disabled=""' }}  value="Write"> Write
    </div>
  </div>
  <div class="col-md-3">
    <div class="row">
      <input type="checkbox" class="english required" name="languages[English][]"   {{ isset($languages->English) &&  in_array('Speak',$languages->English)?"checked":"" }}  {{ isset($languages->English) ?"":'disabled=""' }}  value="Speak"> Speak
    </div>
  </div>
</div>
</br>

</br>
<h4>Technical Experience </h4>
<hr>


@php
$technologies = json_decode($job->technology);
@endphp

<div class="form-group">
  <div class="col-md-3">
    <div class="row">
      <input type="checkbox" name="technology[PHP]" id="php" {{ isset($technologies->PHP) ?"checked":"" }}  placeholder="Board/University"> PHP
    </div>
  </div>
  <div class="col-md-3">
    <div class="row">
      <input type="radio" name="technology[PHP]"  class="php" {{ isset($technologies->PHP) &&  ('Beginner'==$technologies->PHP)?"checked":"" }} " {{ isset($technologies->PHP) ?"":'disabled=""' }}   value="Beginner" > Beginner
    </div>
  </div>
  <div class="col-md-3">
    <div class="row">
      <input type="radio" name="technology[PHP]"  class="php" {{ isset($technologies->PHP) ?"":'disabled=""' }}   {{ isset($technologies->PHP) &&  ('Mediator'==$technologies->PHP)?"checked":"" }} " value="Beginner"  value="Mediator"> Mediator
    </div>
  </div>
  <div class="col-md-3">
    <div class="row">
      <input type="radio"  name="technology[PHP]"  class="php" {{ isset($technologies->PHP) ?"":'disabled=""' }}     {{ isset($technologies->PHP) &&  ('Expert'==$technologies->PHP)?"checked":"" }} " value="Beginner"  value="Expert" > Expert
    </div>
  </div>
</div>


<div class="form-group">
  <div class="col-md-3">
    <div class="row">
      <input type="checkbox" name="technology[MySQL]" id="mysql" {{ isset($technologies->MySQL) ?"checked":"" }} > MySQL
    </div>
  </div>
  <div class="col-md-3">
    <div class="row">
      <input type="radio"  class="mysql"   name="technology[MySQL]"  {{ isset($technologies->MySQL) &&  ('Beginner'==$technologies->MySQL)?"checked":"" }} " {{ isset($technologies->MySQL) ?"":'disabled=""' }}  value="Beginner"> Beginner
    </div>
  </div>
  <div class="col-md-3">
    <div class="row">
      <input type="radio"  class="mysql"  name="technology[MySQL]"  value="Mediator"  {{ isset($technologies->MySQL) ?"":'disabled=""' }}   {{ isset($technologies->MySQL) &&  ('Mediator'==$technologies->MySQL)?"checked":"" }} "  > Mediator
    </div>
  </div>
  <div class="col-md-3">
    <div class="row">
      <input type="radio"   class="mysql"  name="technology[MySQL]"  {{ isset($technologies->MySQL) ?"":'disabled=""' }}     {{ isset($technologies->MySQL) &&  ('Expert'==$technologies->MySQL)?"checked":"" }} " value="Expert"  > Expert
    </div>
  </div>
</div>
</br>



<div class="form-group">
  <div class="col-md-3">
    <div class="row">
      <input type="checkbox" id="laravel" name="technology[Laravel]" {{ isset($technologies->Laravel) ?"checked":"" }}> Laravel
    </div>
  </div>
  <div class="col-md-3">
    <div class="row">
      <input type="radio" class="laravel" name="technology[Laravel]"  {{ isset($technologies->Laravel) &&  ('Beginner'==$technologies->Laravel)?"checked":"" }} " {{ isset($technologies->Laravel) ?"":'disabled=""' }} > Beginner
    </div>
  </div>
  <div class="col-md-3">
    <div class="row">
      <input type="radio" class="laravel" name="technology[Laravel]"  value="Mediator"  {{ isset($technologies->Laravel) ?"":'disabled=""' }}   {{ isset($technologies->Laravel) &&   ('Mediator'==$technologies->Laravel)?"checked":"" }} "  > Mediator
    </div>
  </div>
  <div class="col-md-3">
    <div class="row">
      <input type="radio" class="laravel"  name="technology[Laravel]" {{ isset($technologies->Laravel) ?"":'disabled=""' }}     {{ isset($technologies->Laravel) &&   ('Expert'==$technologies->Laravel)?"checked":"" }} " value="Expert" > Expert
    </div>
  </div>
</div>

<div class="form-group">
  <div class="col-md-3">
    <div class="row">
      <input type="checkbox"  id="oracle" name="technology[Oracle]" {{ isset($technologies->Oracle) ?"checked":"" }} > Oracle
    </div>
  </div>
  <div class="col-md-3">
    <div class="row">
      <input type="radio" class="oracle"  name="technology[Oracle]"  {{ isset($technologies->Oracle) &&  ('Beginner'==$technologies->Oracle)?"checked":"" }} " {{ isset($technologies->Oracle) ?"":'disabled=""' }}  value="Beginner"> Beginner
    </div>
  </div>
  <div class="col-md-3">
    <div class="row">
      <input type="radio"  class="oracle" name="technology[Oracle]" value="Mediator"  {{ isset($technologies->Oracle) ?"":'disabled=""' }}   {{ isset($technologies->Oracle) &&  ('Mediator'==$technologies->Oracle)?"checked":"" }} "  > Mediator
    </div>
  </div>
  <div class="col-md-3">
    <div class="row">
      <input type="radio"  class="oracle" name="technology[Oracle]"  {{ isset($technologies->Oracle) ?"":'disabled=""' }}     {{ isset($technologies->Oracle) &&   ('Expert'==$technologies->Oracle)?"checked":"" }} "  value="Expert"  > Expert
    </div>
  </div>
</div>
</br>
</br>

</br>
<h4>Preference</h4>
<hr>

<div class="form-group">
  <label >Preferred Location 
  </label>
  <select class="form-control required" name="location">
    <option value="">Select</option>
    <option value="Ahmedabad" {{$job->location=="Ahmedabad"?"selected":""}}>Ahmedabad</option>
    <option value="Gandhinagar" {{$job->location=="Gandhinagar"?"selected":""}}>Gandhinagar</option>
    <option value="Surat" {{$job->location=="Surat"?"selected":""}}>Surat</option>
  </select>
</div>
<div class="form-group">
  <label >Expected CTC</label>
  <input type="text" class="form-control required" value="{{$job->ectc}}"  name="ectc">
</div>

<div class="form-group">
  <label >Current CTC</label>
  <input type="text" class="form-control required" value="{{$job->cctc}}"  name="cctc">
</div>
<div class="form-group">
  <label >Notice Period</label>
  <input type="text" class="form-control required" value="{{$job->notice_period}}"  name="notice_period">
</div>


<button type="submit" class="btn btn-primary">Submit</button>
</form>


</div>
</div>
</body>
<script type="text/javascript">
  $("#job_form").validate();
 // $(".datepick").datepicker();
  $( document ).ready(function() {
    $('#gujarati').click(function () {

      if ($(this).is(':checked')) {
        $('.gujarati').removeAttr('disabled');  
      } else {
        $(".gujarati").prop('checked', false);
        $('.gujarati').attr('disabled', true);  
      }
    });

    $('#hindi').click(function () {

      if ($(this).is(':checked')) {
        $('.hindi').removeAttr('disabled');  
      } else {
        $(".hindi").prop('checked', false);
        $('.hindi').attr('disabled', true);  
      }
    });

    $('#english').click(function () {
      if ($(this).is(':checked')) {
        $('.english').removeAttr('disabled');  
      } else {
        $(".english").prop('checked', false);
        $('.english').attr('disabled', true);  
      }
    });

    $('#laravel').click(function () {
      if ($(this).is(':checked')) {
        $('.laravel').removeAttr('disabled');  
      } else {
        $(".laravel").prop('checked', false);
        $('.laravel').attr('disabled', true);  
      }
    });

    $('#mysql').click(function () {
      if ($(this).is(':checked')) {
        $('.mysql').removeAttr('disabled');  
      } else {
        $(".mysql").prop('checked', false);
        $('.mysql').attr('disabled', true);  
      }
    });

    $('#php').click(function () {
      if ($(this).is(':checked')) {
        $('.php').removeAttr('disabled');  
      } else {
        $(".php").prop('checked', false);
        $('.php').attr('disabled', true);  
      }
    });

    $('#oracle').click(function () {
      if ($(this).is(':checked')) {
        $('.oracle').removeAttr('disabled');  
      } else {
        $(".oracle").prop('checked', false);
        $('.oracle').attr('disabled', true);  
      }
    });

    $('.add-more').click(function () {

     var copy_data = `   <div class="form-group work_exp " >
     <div class="col-md-3">
     <div class="row">
     <input type="text" name="experience[company_name][]"   placeholder="Company"> 
     </div>
     </div>
     <div class="col-md-3">
     <div class="row">
     <input type="text" name="experience[designation][]"    placeholder="Designation"> 
     </div>
     </div>
     <div class="col-md-3">
     <div class="row">
     <input type="date" name="experience[from][]"   placeholder="From" class="datepick" autocomplete="off"> 
     </div>
     </div>
     <div class="col-md-3">
     <div class="row">
     <input type="date" name="experience[to][]"   placeholder="To" class="datepick" autocomplete="off"><button class="btn btn-danger remove" type="button">X</button> </div>
     </div>
     </div>

     </div>`;





     $("#work_exp").append( copy_data );
   //  $(".datepick").datepicker();
   });


    $('#work_exp').on('click', '.remove', function(e){
      e.preventDefault();
      console.log($(this).closest('.work_exp').remove());
    });



  });</script>
  </html>
