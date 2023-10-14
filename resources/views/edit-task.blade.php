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
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <section class="section py-5">
            <div class="section-body">
                <div class="container">
                    <div class="col-12 py-3">
                        @if (session()->has('message'))
                            <div class="alert bg-info">
                                {{ session('message') }}
                            </div>
                        @endif
                    </div>                                                                                                                                                         
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header bg-primary text-white">Edit Task</div>
                                <div class="card-body">
                                    <form action="{{ route('edit_task', $taskUpdate->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="task_name" class="form-label">Task Name<span class="text-danger">*</span></label>                                                  
                                                    <input type="text" name="task_name" class="form-control" value="{{ $taskUpdate->task_name}}" placeholder="Enter the task name">                         
                                                    @if($errors->has('task_name'))
                                                        <div class="text text-danger">
                                                            {{ $errors->first('task_name') }}
                                                        </div>
                                                    @endif
                                                </div>                                                                   
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="task_priority" class="form-label">Task Priority<span class="text-danger">*</span></label>   
                                                    <select name="task_priority" class="form-select">
                                                        <option value="">--Select Priority--</option>
                                                        <option value="High">High</option>
                                                        <option value="Medium">Medium</option>
                                                        <option value="Low">Low</option>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      
                                                    </select>
                                                    @if($errors->has('task_priority'))
                                                        <div class="text text-danger">
                                                            {{ $errors->first('task_priority') }}
                                                        </div>
                                                    @endif
                                                </div>                                                                                                                          
                                            </div>                                                                                                                                       
                                        </div>
                                             
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="task_timestamp" class="form-label">Task Timestamp<span class="text-danger">*</span></label>                                                  
                                                    <input type="datetime-local" class="form-control" name="task_timestamp" value="{{ old('task_timestamp') }}" placeholder="Enter the timestamp">
                                                    @if($errors->has('task_timestamp'))
                                                        <div class="text text-danger">
                                                            {{ $errors->first('task_timestamp') }}
                                                        </div>
                                                    @endif                    
                                                </div>                                                                                                         
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <div class="mb-3">
                                                    <label for="task_name" class="form-label">Status</label>   
                                                    <select name="status" value="{{ old('task_timestamp') }}" class="form-select" aria-label="Default select example">
                                                        <option selected>--Select Status--</option>
                                                        <option value="0">Off</option>
                                                        <option value="1">On</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>
</body>

</html>
