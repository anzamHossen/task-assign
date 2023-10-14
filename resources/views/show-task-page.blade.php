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

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: sans-serif;

            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        *::-webkit-scrollbar {
            display: none;
        }

        .board {
            width: 100%;
            height: 100vh;
            overflow: scroll;

            background-image: url(https://t3.ftcdn.net/jpg/01/02/48/36/360_F_102483600_JGhPmhrAfzEeWIib532EtIqAcvRCYaMi.jpg);
            background-position: center;
            background-size: cover;
        }

        /* ---- FORM ---- */
        #todo-form {
            padding: 32px 32px 0;
        }

        #todo-form input {
            padding: 12px;
            margin-right: 12px;
            width: 225px;

            border-radius: 4px;
            border: none;

            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);
            background: white;

            font-size: 14px;
            outline: none;
        }

        #todo-form button {
            padding: 12px 32px;

            border-radius: 4px;
            border: none;

            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);
            background: #ffffff;
            color: black;

            font-weight: bold;
            font-size: 14px;
            cursor: pointer;
        }

        /* ---- BOARD ---- */
        .lanes {
            display: flex;
            align-items: flex-start;
            justify-content: start;
            gap: 16px;

            padding: 24px 32px;

            overflow: scroll;
            height: 100%;
        }

        .heading {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .swim-lane {
            display: flex;
            flex-direction: column;
            gap: 12px;

            background: #f4f4f4;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);

            padding: 12px;
            border-radius: 4px;
            width: 225px;
            min-height: 120px;

            flex-shrink: 0;
        }

        .task {
            background: white;
            color: black;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.15);

            padding: 12px;
            border-radius: 4px;

            font-size: 16px;
            cursor: move;
        }

        .is-dragging {
            scale: 1.05;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.25);
            background: rgb(50, 50, 50);
            color: white;
        }
    </style>

</head>

<body>
    <header>
        <!-- place navbar here -->
    </header>
    <main>
        <section class="section py-5">
            <div class="section-body">
                <div class="container">
                    <div class="board">
                        {{-- <form id="todo-form">
                            <a href="{{ route('create_task') }}">
                                <button type="submit"></button>
                            </a>
                        </form> --}}

                        <div class="text-center py-3">
                            <a href="{{ route('create_task') }}" class="btn btn-primary">Add New+</a>
                        </div>

                        <div class="lanes">
                            <div class="swim-lane" id="todo-lane">
                                <h3 class="heading">Task Assign</h3>
                                @foreach ($getTask as $task )
                                    <p class="task" draggable="true">{{ $task->task_name.' '.$task->task_priority. ' '.$task->task_timestamp}}</p>
                                    {{-- <p class="task" draggable="true">Create Webpage</p>
                                    <p class="task" draggable="true">Page Dynamic</p>
                                    <p class="task" draggable="true">Application Done<p> --}}
                                @endforeach
                            </div>

                            <div class="swim-lane">
                                <h3 class="heading">Doing</h3>

                                {{-- <p class="task" draggable="true">Check It</p> --}}
                            </div>

                            <div class="swim-lane">
                                <h3 class="heading">Done</h3>

                                {{-- <p class="task" draggable="true">
                                    Hava nice day
                                </p> --}}
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

    {{-- <script>
        const form = document.getElementById("todo-form");
        const input = document.getElementById("todo-input");
        const todoLane = document.getElementById("todo-lane");

        form.addEventListener("submit", (e) => {
            e.preventDefault();
            const value = input.value;

            if (!value) return;

            const newTask = document.createElement("p");
            newTask.classList.add("task");
            newTask.setAttribute("draggable", "true");
            newTask.innerText = value;

            newTask.addEventListener("dragstart", () => {
                newTask.classList.add("is-dragging");
            });

            newTask.addEventListener("dragend", () => {
                newTask.classList.remove("is-dragging");
            });

            todoLane.appendChild(newTask);

            input.value = "";
        });
    </script> --}}
    <script>
        const draggables = document.querySelectorAll(".task");
        const droppables = document.querySelectorAll(".swim-lane");

        draggables.forEach((task) => {
            task.addEventListener("dragstart", () => {
                task.classList.add("is-dragging");
            });
            task.addEventListener("dragend", () => {
                task.classList.remove("is-dragging");
            });
        });

        droppables.forEach((zone) => {
            zone.addEventListener("dragover", (e) => {
                e.preventDefault();

                const bottomTask = insertAboveTask(zone, e.clientY);
                const curTask = document.querySelector(".is-dragging");

                if (!bottomTask) {
                    zone.appendChild(curTask);
                } else {
                    zone.insertBefore(curTask, bottomTask);
                }
            });
        });

        const insertAboveTask = (zone, mouseY) => {
            const els = zone.querySelectorAll(".task:not(.is-dragging)");

            let closestTask = null;
            let closestOffset = Number.NEGATIVE_INFINITY;

            els.forEach((task) => {
                const {
                    top
                } = task.getBoundingClientRect();

                const offset = mouseY - top;

                if (offset < 0 && offset > closestOffset) {
                    closestOffset = offset;
                    closestTask = task;
                }
            });

            return closestTask;
        };
    </script>
</body>

</html>
