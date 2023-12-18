@extends('admin.layouts.app')

@section('content')


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Comment / Edit</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    </ol>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content  h-100"">
        <div class="container-fluid  h-100"">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-md-12">	
                    <form action="" method="post" name="updateCommentForm" id="updateCommentForm">					
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('commentList') }}" class="btn btn-primary">Back</a>
                            </div>

                            <div class="card-body">

                                <div class="form-group mt-4">
                                    <label for="status">
                                        Status
                                    </label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" {{ ($comment->status == 1) ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ ($comment->status == 0) ? 'selected' : '' }}>Not Active</option>
                                    </select>                                    
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary">Update</button>

                            </div>
                        </div>
                    </form>
                </div>                            
            </div>
            <!-- /.row -->
            <!-- /.row (main row) -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->


@endsection


@section('extraJs')

    <script type="text/javascript">
  
        $("#updateCommentForm").submit(function(){
            event.preventDefault();
            $("button[type='submit']").prop('disabled', true);
            $.ajax({
                url: '{{ route("comment.update", $comment->id) }}',
                type: 'POST',
                dataType: 'json',
                data: $("#updateCommentForm").serializeArray(),
                success: function(response){
                    $("button[type='submit']").prop('disabled', false);

                    if (response.status == 200) {
                        // no error
                        window.location.href = '{{ route("commentList") }}';
                    } else {
                        // Here we will show errors
                        $('.question-error').html(response.errors.question);
                    }
                }
            });
        });


    </script>

@endsection