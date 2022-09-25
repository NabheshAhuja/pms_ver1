@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'tasks',
])

@section('content')
    <br><br><br><br>

    @push('styles')
        <style>
            #sortable1,
            #sortable2,#sortable3, #sortable4, #sortable5 {
                border: 1px solid #eee;
                width: 142px;
                min-height: 20px;
                list-style-type: none;
                margin: 0;
                padding: 5px 0 10px 0;
                float: left;
                margin-right: 60px;
            }


            #sortable1 li,
            #sortable2 li,
            #sortable3 li,
            #sortable4 li,
            #sortable5 li
             {
                margin: 0 5px 5px 5px;
                padding: 5px;
                font-size: 1.2em;
                width: 120px;
            }

            h4 {
                /* margin-right: 20px */
                width: 150%
            }
        </style>
    @endpush


    <div class="row">
        <div class="col-12">
            <ul id="sortable1" class="connectedSortable">
                <h4 style="text-align:left">Future<input type="button" value="+" id="add" onclick="added('future')">
                    <input type="button" value="-" id="hidee" onclick="hiddens()">
                </h4>
            </ul>

            <ul id="sortable2" class="connectedSortable">
                <h4 style="text-align:left">&nbsp;&nbsp;ToDo<input type="button" value="+" id="add"
                        onclick="added('todo')">
                    <input type="button" value="-" id="hidee" onclick="hiddens()">
                </h4>
            </ul>


            <ul id="sortable3" class="connectedSortable">
                <h4 style="text-align:left">Progress<input type="button" value="+" id="add"
                        onclick="added('Progress')"> <input type="button" value="-" id="hidee"
                        onclick="hiddens()">
                </h4>

            </ul>
            <ul id="sortable4" class="connectedSortable">
                <h4 style="text-align:left">Rejected<input type="button" value="+" id="add"
                        onclick="added('rejected')">
                    <input type="button" value="-" id="hidee" onclick="hiddens()">
                </h4>

            </ul>
            <ul id="sortable5" class="connectedSortable">
                <h4 style="text-align:center">Finished<input type="button" value="+" id="add"
                        onclick="added('finished')">
                    <input type="button" value="-" id="hidee" onclick="hiddens()">
                </h4>

            </ul>
        </div>
    </div>



    <div id="any" saclass="form-group mb-4">
        {{-- <label for="tasks">Add Tasks</label> --}}
        <input type="text" class="form-control mb-4" id="tasks" placeholder="add Tasks">
        <input type="button" value="add task" id="add" onclick="addd()">
    </div>
    @push('scripts')
        <script>
            $(document).ready(function() {
                $('#any').hide();
            });
            $(function() {
                $("#sortable1, #sortable2,#sortable3,#sortable4,#sortable5").sortable({
                    connectWith: ".connectedSortable"

                }).disableSelection();
            });
        </script>

        <script>
            var listName = "";
            // $(document).ready(function() {
            //     $('#sortable1,#sortable2,#sortable3,#sortable4,#sortable5').hide();
            // });

            function addd(add) {

                // console.log(listName);
                if (listName == "future") {
                    
                var node = document.createElement("Li");
                var text = document.getElementById("tasks").value;
                var textnode = document.createTextNode(text);
                node.appendChild(textnode);
                document.getElementById("sortable1").appendChild(node);    
                }
                else if (listName == "todo") {
                    
                var node = document.createElement("Li");
                var text = document.getElementById("tasks").value;
                var textnode = document.createTextNode(text);
                node.appendChild(textnode);
                document.getElementById("sortable2").appendChild(node);    
                }
                else if (listName == "progress") {
                    
                var node = document.createElement("Li");
                var text = document.getElementById("tasks").value;
                var textnode = document.createTextNode(text);
                node.appendChild(textnode);
                document.getElementById("sortable3").appendChild(node);    
                }
                else if (listName == "rejected") {
                    
                var node = document.createElement("Li");
                var text = document.getElementById("tasks").value;
                var textnode = document.createTextNode(text);
                node.appendChild(textnode);
                   
                var node1 = document.createElement("input");
                node1.type = "button";
                node1.value = "+";
                document.getElementById("sortable4").appendChild(node).appendChild(node1);
                }
                else if (listName == "finished") {
                    
                var node = document.createElement("Li");
                var text = document.getElementById("tasks").value;
                var textnode = document.createTextNode(text);
                node.appendChild(textnode);
                document.getElementById("sortable5").appendChild(node);    
                }
                
            }

            function added(listNameParameter) {
                listName = listNameParameter;
                $('#any').show();
            }

            function hiddens() {
                $('#any').hide();
            }


            // function grp() {
            //     var click = document.getElementById("list-items");
            //     if (click.style.display === "none") {
            //         click.style.display = "block";
            //     } else {
            //         click.style.display = "none";
            //     }
            // }

            // var node1 = document.createElement("button");

            // node1.type = "button";
            // node1.value = "+";
            
            // var node2 = document.createElement("div");
            // node2.class = "dropdown";
            // var btn = document.createElement("button");
            // btn.onclick = drp();
            // btn.class = "dropbtn";


            // document.getElementById("sortable1").appendChild(node2);
            // document.getElementById("sortable1").appendChild(node1);
        </script>
    @endpush
@endsection
