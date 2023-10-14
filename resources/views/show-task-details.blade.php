<!doctype html>
<html lang="en">

<head>
    <title>Task Management</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS v5.2.1 -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
       referrerpolicy="no-referrer" />

</head>

<body>
    <main>
        <section class="section py-5">
            <div class="section-body">
                <div class="container">
                    <a href="{{ route('show_task_page') }}" class="btn btn-primary">Show Task</a>
                    <div class="col-12 py-3">
                        @if (session()->has('message'))
                            <div class="alert bg-info">
                                {{ session('message') }}
                            </div>
                        @endif
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <div class="alert bg-danger">
                                    {{ $error }}
                                </div>
                            @endforeach
                        @endif  
                    </div>  
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-renponsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>SL</th>
                                            <th>Task Name</th>
                                            <th>Priority</th>
                                            <th>Timestamp</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($task as $item)
                                            <tr>
                                                <td>{{ $loop->index + 1 }}</td>
                                                <td>{{ $item->task_name }}</td>
                                                <td>{{ $item->task_priority }}</td>
                                                <td>{{ $item->task_timestamp }}</td>
                                                <td>
                                                    @if ($item->status == 1)
                                                       <a href="" class="btn btn-success btn-sm">Active</a>
                                                    @else
                                                       <a href="" class="btn btn-danger btn-sm">Inactive</a>
                                                    @endif
                                                </td>
                                                    
                                                <td>
                                                    <a href="{{ route('edit_task', $item->id) }}" class="btn btn-success fa fa-edit">Edit</a>
                                                    <a href="{{ route('delete_task', $item->id) }}" class="btn btn-danger fa fa-trash">Delete</a>
                                                </td>
                                            </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                                <div class="mr-5">
                                    {{ $task->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
   
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>
    <script>
        $('#dataTable').DataTable({
            "responsive": true,
            "autoWidth": false,
        });
    </script>
</body>

</html>