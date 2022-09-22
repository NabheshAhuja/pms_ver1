@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'tasks',
])

@section('content')
    <br><br><br><br>

    @push('styles')
        <style>
            #sortable1,
            #sortable2 {
                border: 1px solid #eee;
                width: 142px;
                min-height: 20px;
                list-style-type: none;
                margin: 0;
                padding: 5px 0 0 0;
                float: left;
                margin-right: 10px;
            }

            #sortable1 li,
            #sortable2 li {
                margin: 0 5px 5px 5px;
                padding: 5px;
                font-size: 1.2em;
                width: 120px;
            }
        </style>
    @endpush


    <div class="form-group mb-4">
        <label for="tasks">Add Tasks</label>
        <input type="text" class="form-control mb-4" id="tasks" placeholder="add Tasks">
        <input type="button" value="add task" id="add">
    </div>

    <ul id="sortable1" class="connectedSortable">
        <h4 style="text-align:center">Assigned</h4>

    </ul>




    <ul id="sortable1" class="connectedSortable">
        <h4 style="text-align:center">ToDo</h4>

    </ul>


    <ul id="sortable1" class="connectedSortable">
        <h4 style="text-align:center">In Progress</h4>

    </ul>
    <ul id="sortable1" class="connectedSortable">
        <h4 style="text-align:center">Rejected </h4>

    </ul>
    <ul id="sortable1" class="connectedSortable">
        <h4 style="text-align:center">Finished</h4>

    </ul>

    @push('scripts')
        <script>
            $(function() {
                $("#sortable1, #sortable2").sortable({
                    connectWith: ".connectedSortable"

                }).disableSelection();
            });
            (function($) {
                $('#myform').submit(function(e) {
                    var val = $('#tasks').val();
                    $('ul.sortable1').append('<li>' + val + '</li>');
                    e.preventDefault();
                });
            });
        </script>

        <script>
            document.getElementById("add").onclick = function() {

                var node = document.createElement("Li");
                var text = document.getElementById("tasks").value;
                var textnode = document.createTextNode(text);
                node.appendChild(textnode);
                a = document.getElementById("sortable1").appendChild(node);
            }
        </script>
    @endpush
@endsection
