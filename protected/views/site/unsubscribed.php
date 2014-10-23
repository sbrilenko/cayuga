<div id="wrapper">
</div><!--end wrapper-->

<script>
    $(document).ready(function()
    {
        var buttonArray={}
        buttonArray["Ok"]=function() { $("#dialog").hide();$( this ).dialog( "destroy" );}
        $("#dialog").empty().append("You are now unsubscribed").dialog({
            dialogClass:'dialog',
            position: { my: "center",at: "center",of: window},
            draggable:false,
            modal:true,
            buttons:buttonArray
        });
    })


</script>


