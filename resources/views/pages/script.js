$(".collapse-btn").on("click", function () {
    $(this).children().toggleClass("fa-minus fa-plus");
});

// Change progress-bar color into border-top-color
$(".panel-body").each(function (index) {
    var color = $(this).parent().css("border-top-color");
    $(this).find(".progress-bar").css("background-color", color);
});

// Drag and drop + sortable
// Working on tablets and mobile devices?
$(function () {
    $(".panel-body").sortable({
        connectWith: ".panel-body",
        start: function (event, ui) {},
        receive: function (event, el) {
            //$(el).find('.progress-bar').css('background-color', $(el).find('.panel-yellow').css('background-color'));
            var node = $(el.item[0].offsetParent.children[0]);
            var color = $(node[0]).css("border-top-color");

            $(el.item).find(".progress-bar").css("background-color", color);
        },
    });
});

/*** Side menu ***/

$("#menu-toggle").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled");
});
$("#menu-toggle-2").click(function (e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled-2");
    $("#menu ul").hide();
});

function initMenu() {
    $("#menu ul").hide();
    $("#menu ul").children(".current").parent().show();
    //$('#menu ul:first').show();
    $("#menu li a").click(function () {
        var checkElement = $(this).next();
        if (checkElement.is("ul") && checkElement.is(":visible")) {
            return false;
        }
        if (checkElement.is("ul") && !checkElement.is(":visible")) {
            $("#menu ul:visible").slideUp("normal");
            checkElement.slideDown("normal");
            return false;
        }
    });
}

initMenu();

/*** NOT USED ***/

$(function () {
    var panel = $(".panel-body");
    panel.css("max-height", window.innerHeight - 150 + "px");
    draggableInit();
});

function draggableInit() {
    var sourceID;
    var source;

    $("[draggable=true]").bind("dragstart", function (e) {
        sourceID = $(this).parent().attr("id");
        e.originalEvent.dataTransfer.setData(
            "text/plain",
            e.target.getAttribute("id")
        );
        source = e.target;
        //console.log("dragstart");
        //console.dir(e);
    });

    $(".panel-body").bind("dragover", function (e) {
        e.preventDefault();
        e.stopPropagation();
    });

    $(".panel-body").bind("drop", function (e) {
        //console.log("drop");
        //console.dir(e);
        e.preventDefault();
        e.stopPropagation();

        //var children = $(this).children();
        //var targetID = children.attr('id');

        var target = $(this);
        var targetID = $(this).attr("id");

        if (sourceID != targetID) {
            var elementID = e.originalEvent.dataTransfer.getData("text/plain");

            // Show spinner
            $("#processing-modal").modal("toggle");

            setTimeout(function () {
                // Drop data
                var element = document.getElementById(elementID);
                target.append(element);

                if (isbefore(source, e.target)) {
                    //e.target.parentNode.insertBefore(source, e.target);
                    //e.target.prepend(element);
                } else {
                    //e.target.parentNode.insertBefore(source, e.target.nextSibling);
                    //e.target.append(element);
                }

                // Remove spinner
                $("#processing-modal").modal("toggle");
            }, 750);
        }
    });
}

function isbefore(a, b) {
    if (a.parentNode == b.parentNode) {
        for (var cur = a; cur; cur = cur.previousSibling) {
            if (cur === b) {
                return true;
            }
        }
    }
    return false;
}
