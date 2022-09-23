<script>
    $(document).ready(function() {$("#any").hide()}); $(function(){" "}
    {$("#sortable1, #sortable2")
        .sortable({
            connectWith: ".connectedSortable",
        })
        .disableSelection()}
    );
    $(document).ready(function() {
                $('#sortable1').hide()
            });

            function addd(add) {

                var node = document.createElement("Li");
                var text = document.getElementById("tasks").value;
                var textnode = document.createTextNode(text);
                node.appendChild(textnode);
                document.getElementById("sortable1").appendChild(node);
            {"}"}

            function added() {
                $('#any').show();
            {"}"}

            function hiddens() {
                $('#any').hide();
            {"}"}
</script>;
