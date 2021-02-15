@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Job list</div>

        <div class="card-body">
          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
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
          <table id="dtBasicExample" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
            <thead>
              <tr>
                <th class="th-sm">Name</th>
                <th class="th-sm">Email</th>
                <th class="th-sm">Gender</th>
                <th class="th-sm">Contact</th>
                <th class="th-sm">Location</th>
                <th class="th-sm">Action</th>
              </tr>
            </thead>
            <tbody>

              @if(!empty($jobs))
              @foreach($jobs as $job)
              <tr>
                <td>{{ $job->name }}</td>
                <td>{{ $job->email }}</td>
                <td>{{ $job->gender }}</td>
                <td>{{ $job->contact }}</td>
                <td>{{ $job->location }}</td>
                <td><a href="{{ route('job.edit',$job->id) }}">Edit</a> | <a href="{{ route('job.view',$job->id) }}">View</a>  |  

                  <a href="{{ route('job.delete', $job->id) }}" 
                    onclick="event.preventDefault(); delete_form({{ $job->id }});"> 
                    Delete  
                  </a> 
                </td> 
                <form id="delete-form-{{$job->id}}"  
                  + action="{{route('job.delete', $job->id)}}" 
                  method="post"> 
                  @csrf
                  @method('DELETE') 
                </form> 
              </td>
            </tr>
            @endforeach
            @endif

          </tbody>

        </table>
      </div>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">

  function delete_form(id){
    var result = confirm("Want to delete?");
    if (result) {
     document.getElementById( 
      'delete-form-'+id).submit();
   }
 }
</script>
@endsection
