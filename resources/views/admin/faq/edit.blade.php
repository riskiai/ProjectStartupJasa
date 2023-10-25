@extends('admin.layouts.app')

@section('content')


    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Faq / Edit</h1>
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
                    <form action="" method="post" name="updateFaqForm" id="updateFaqForm">					
                        <div class="card">
                            <div class="card-header">
                                <a href="{{ route('faqList') }}" class="btn btn-primary">Back</a>
                            </div>

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Question</label>
                                    <input type="text" value="{{ $faq->question }}" name="question" id="question" class="form-control">
                                    <p class="error question-error" ></p>
                                </div>

                                <div class="form-group">
                                    <label for="name">Answer</label>
                                    <textarea name="answer" id="answer" class="summernote">{{ $faq->answer }}</textarea>
                                </div>

                                <div class="form-group mt-4">
                                    <label for="status">
                                        Status
                                    </label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="1" {{ ($faq->status == 1) ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ ($faq->status == 0) ? 'selected' : '' }}>>Block</option>
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
  
        $("#updateFaqForm").submit(function(){
            event.preventDefault();
            $("button[type='submit']").prop('disbaled', true);
            $.ajax({
                url: '{{ route("faq.update", $faq->id) }}',
                type: 'POST',
                dataType: 'json',
                data: $("#updateFaqForm").serializeArray(),
                success: function(response){
                    $("button[type='submit']").prop('disbaled', false);

                    if (response.status == 200) {
                        // no erro
                        window.location.href = '{{ route("faqList") }}';
                    }else {
                        // Here we will show erros
                        $('.question-error').html(response.errors.question);
                    }
                }
            });
        });
    </script>

@endsection