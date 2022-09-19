{{-- @extends('layouts.app', [
    'class' => '',
    'elementActive' => 'tasks',
]) --}}

<ul style=float:left>
    <li class="dropzone" id='0' draggable="true">List item 1</li>
</ul>
<ul style=float:left>
    <li class="dropzone" id='1' draggable="true">List item 2</li>
</ul>

<ul style=float:left>
    <li class="dropzone" id='2' draggable="true">List item 3</li>
</ul>
<ul style=float:left>
    <li class="dropzone" id='3' draggable="true">List item 4</li>
</ul>
<ul style=float:left>
    <li class="dropzone" id='4' draggable="true">List item 5</li>
</ul>

<script>
    let dragged;
    let id;
    let index;
    let indexDrop;
    let list;

    document.addEventListener("dragstart", ({
        target
    }) => {
        dragged = target;
        id = target.id;
        list = target.parentNode.children;
        for (let i = 0; i < list.length; i += 1) {
            if (list[i] === dragged) {
                index = i;
            }
        }
    });

    document.addEventListener("dragover", (event) => {
        event.preventDefault();
    });

    document.addEventListener("drop", ({
        target
    }) => {
        if (target.className == "dropzone" && target.id !== id) {
            dragged.remove(dragged);
            for (let i = 0; i < list.length; i += 1) {
                if (list[i] === target) {
                    indexDrop = i;
                }
            }
            console.log(index, indexDrop);
            if (index > indexDrop) {
                target.before(dragged);
            } else {
                target.after(dragged);
            }
        }
    });
</script>
