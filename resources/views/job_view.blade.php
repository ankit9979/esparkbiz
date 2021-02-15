@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Job View</div>

        <div class="card-body">
          <h4>General Info</h4>
          <table cellpadding="10" cellspacing="10">

            <tr><td class="bold">Name</td><td>:</td><td>{{ $job->name }}</td></tr>
            <tr><td class="bold">Email</td><td>:</td><td>{{ $job->email }}</td></tr>
            <tr><td class="bold">Contact</td><td>:</td><td>{{ $job->contact }}</td></tr>
            <tr><td class="bold">Address</td><td>:</td><td>{{ $job->address }}</td></tr>
            <tr><td class="bold">Gender</td><td>:</td><td>{{ $job->gender }}</td></tr>
            

          </table>
          <h4>Education</h4>
          <table cellpadding="10" cellspacing="10">

            <tr><td class="bold"> </td><td>Board</td><td>Year</td><td>Grade</td></tr>
            <tr><td class="bold">SSC</td><td>{{ $job->ssc_board }}</td><td>{{ $job->ssc_year }}</td><td>{{ $job->sss_grade }}</td></tr>
            <tr><td class="bold">HSC</td><td>{{ $job->hsc_board }}</td><td>{{ $job->hsc_year }}</td><td>{{ $job->hsc_grade }}</td></tr>
            <tr><td class="bold">Graduation</td><td>{{ $job->graduation_board }}</td><td>{{ $job->graduation_year }}</td><td>{{ $job->graduation_grade }}</td></tr>
            <tr><td class="bold">Degree</td><td>{{ $job->degree_board }}</td><td>{{ $job->degree_year }}</td><td>{{ $job->degree_grade }}</td></tr>
            

          </table>


          <h4>Experince</h4>
          <table cellpadding="10" cellspacing="10">


            @php
            $job_exps = json_decode($job->experience);
            @endphp
            <tr><td>Company</td><td>Designation</td><td>From </td><td>To</td></tr>
            @if(!empty( $job_exps ))
            @foreach($job_exps as $experience)
            <tr>
              <td>{{ $experience->company_name }}</td>
              <td>{{  $experience->designation }}</td>
              <td>{{  date('d-m-Y',strtotime($experience->from)) }}</td>
                <td>{{  date('d-m-Y',strtotime($experience->to)) }}</td>
            </tr>

            @endforeach
            @endif
          </table>


          <h4>Known Languages</h4>
          <table cellpadding="10" cellspacing="10">

            @php
            $languages = json_decode($job->languages);
            @endphp

            <tr><td class="bold">Hindi</td><td>:</td>
              @isset($languages->hindi)
              @foreach($languages->hindi as $hindi)
              <td>{{ $hindi }}</td>
              @endforeach
              @endisset
            </tr>
            <tr><td class="bold">English</td><td>:</td>
              @isset($languages->english)
              @foreach($languages->english as $english)
              <td>{{ $english }}</td>
              @endforeach
              @endisset
            </tr>


            <tr><td class="bold">Gujarati</td><td>:</td>
              @isset($languages->gujarati)
              @foreach($languages->gujarati as $gujarati)
              <td>{{ $gujarati }}</td>
              @endforeach
              @endisset
            </tr>

          </table>


          <h4>Technical Experience</h4>
          <table cellpadding="10" cellspacing="10">

            @php
            $technologies = json_decode($job->technology);
            @endphp

            <tr><td class="bold">PHP</td><td>:</td>
              @isset($technologies->PHP)              
              <td>{{$technologies->PHP}}</td>              
              @endisset
            </tr>
            
            <tr><td class="bold">MYSQL</td><td>:</td>
              @isset($technologies->MySQL)              
              <td>{{$technologies->MySQL}}</td>              
              @endisset
            </tr>
            
            <tr><td class="bold">Laravel</td><td>:</td>
              @isset($technologies->Laravel)              
              <td>{{$technologies->Laravel}}</td>              
              @endisset
            </tr>
            
            <tr><td class="bold">Oracle</td><td>:</td>
              @isset($technologies->Oracle)              
              <td>{{$technologies->Oracle}}</td>              
              @endisset
            </tr> 
          </table>

          <h4>Preference</h4>
          <table cellpadding="10" cellspacing="10">
           <tr><td class="bold">Preferred Location</td><td>:</td><td>{{ $job->location }}</td></tr>
           <tr><td class="bold">Expected CTC</td><td>:</td><td>{{ $job->ectc }}</td></tr>
           <tr><td class="bold">Current CTC</td><td>:</td><td>{{ $job->cctc }}</td></tr>
           <tr><td class="bold">Notice Period</td><td>:</td><td>{{ $job->notice_period }}</td></tr>
         </table>

       </div>
     </div>
   </div>
 </div>
</div>


@endsection
