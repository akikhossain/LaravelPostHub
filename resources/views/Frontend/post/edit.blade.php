@extends('Frontend.master')
@section('content')
<section class="section-11 ">
    <div class="container  mt-5">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Create Your Post</h3>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="container-fluid">
                <form action="#" method="post" id="createPostForm" name="createPostForm">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="title">Title</label>
                                        <input value="{{ $post->title }}" type="text" name="title" id="title"
                                            class="form-control" placeholder="Title">
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="short_description">Short Description</label>
                                        <textarea type="text" name="short_description" id="short_description"
                                            class="form-control" placeholder="Short Description">{{ $post->short_description }}
                                        </textarea>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="description">Description</label>
                                        <textarea type="text" name="description" id="description" class="form-control"
                                            placeholder="Description">{{ $post->description }}
                                        </textarea>
                                        <p></p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control" id="image" name="image"
                                                accept="image/*">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="status">Status</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pb-5 pt-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href=" " class="btn btn-outline-dark ml-3">Cancel</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </section>
    </div>
</section>
<!-- /.content -->
@endsection

@section('customJs')
<script>
    $("#createPostForm").submit(function(event) {
                    event.preventDefault();
                    var element = $(this);
                    $("button[type=submit]").prop('disabled', true);
                    $.ajax({
                        url: '{{ route('post.update', $post->id) }}',
                        type: 'put',
                        data: element.serializeArray(),
                        dataType: 'json',
                        success: function(response) {

                            $("button[type=submit]").prop('disabled', false);
                            if (response['status'] == true) {
                                window.location.href = "{{ route('post.list') }}";
                                $("#title").removeClass('is-invalid').siblings('p').removeClass(
                                    'invalid-feedback').html("");

                                $("#short_description").removeClass('is-invalid').siblings('p').removeClass(
                                    'invalid-feedback').html("");
                            } else {
                                var errors = response['errors'];
                                if (errors['title']) {
                                    $("#title").addClass('is-invalid').siblings('p').addClass('invalid-feedback')
                                        .html(errors['title']);
                                } else {
                                    $("#title").removeClass('is-invalid').siblings('p').removeClass(
                                        'invalid-feedback').html("");
                                }
                                if (errors['short_description']) {
                                    $("#short_description").addClass('is-invalid').siblings('p').addClass('invalid-feedback')
                                        .html(errors['short_description']);
                                } else {
                                    $("#short_description").removeClass('is-invalid').siblings('p').removeClass(
                                        'invalid-feedback').html("");
                                }
                            }
                        },
                        error: function(jqXHR, exception) {
                            console.log("Something went wrong");
                        }
                    });
                });
</script>
@endsection