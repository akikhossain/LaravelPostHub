@extends('Frontend.master')
@section('content')
<section class="section-11 ">
    <div class="container  mt-5">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            @include('Frontend.message')
            <div class="shadow p-4 d-flex justify-content-between align-items-center ">
                <h4 class="text-uppercase">My Post List</h4>
                <div>
                    <a href="{{ route('post.create') }}" class="btn btn-success p-2 text-lg rounded-pill">
                        <i class="fa-solid fa-plus me-2"></i>Create new Post
                    </a>
                </div>
            </div>
            <div class="py-5">
                <div class=" ">
                    <div class="rounded  mb-5">
                        <form action="" method="get">
                            <div class="card-header d-flex justify-content-between  align-items-center">
                                <div class="card-title">
                                    <button style="margin-right: 15px" type="button"
                                        onclick="window.location.href='{{ route('post.list') }}'"
                                        class="btn btn-outline-dark btn-rounded rounded-pill">
                                        Reset
                                    </button>
                                </div>
                                <div class="card-tools">
                                    <div class="input-group input-group" style="width: 250px;">
                                        <input type="text" value="{{ Request::get('keyword') }}" name="keyword"
                                            class="form-control float-right" placeholder="Search">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-default">
                                                <i class="fas fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table align-middle text-center w-100 mx-auto bg-white">
                    <thead class="bg-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Short Description</th>
                            <th scope="col">Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if ($posts->isNotEmpty())
                        @foreach ($posts as $key => $post)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->short_description }}</td>
                            <td>{{ $post->created_at->setTimeZone('Asia/Dhaka')->format('Y-m-d H:i:s') }}</td>
                            <td>
                                <a class="btn btn-outline-dark btn-rounded rounded-pill" data-mdb-ripple-color="dark"
                                    href="{{ route('post.edit', $post->id) }}"><i
                                        class="fa-solid fa-pen-to-square"></i></a>
                                <a onclick="return deletePost({{ $post->id }})"
                                    class="btn btn-outline-danger btn-rounded rounded-pill" data-mdb-ripple-color="dark"
                                    href=""><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5" class="text-danger" style="font-size: 25px;">No data found
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
                <div class="w-25 mx-auto mt-4">
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
</section>
@endsection
@section('customJs')
<script>
    function deletePost(id) {
        if (confirm('Are you sure you want to delete this record?')) {
            var url = '{{ route('post.delete', ':id') }}';
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status == true) {
                        window.location.href = "{{ route('post.list') }}";
                    }
                }
            });
            return false;
        }
    }
</script>
@endsection