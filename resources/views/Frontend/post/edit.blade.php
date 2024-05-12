@extends('Frontend.master')
@section('content')
<section class="section-11 ">
    <div class="container mt-5">
        <section class="content-header">
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h3>Update Your Post</h3>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="container-fluid">
                <form action="{{ route('post.update', $post->id) }}" method="POST" id="createPostForm"
                    name="createPostForm" enctype="multipart/form-data">
                    @csrf
                    @method('put')
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
                                            <option {{ $post->status == 1 ? 'selected' : '' }} value="1">Active
                                            </option>
                                            <option {{ $post->status == 0 ? 'selected' : '' }} value="0">Inactive
                                            </option>
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

@endsection