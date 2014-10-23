<div id="wrapper">
<!--    <form style="margin: 0 0 18px;" action='https://crm.zoho.com/crm/Unsubscribe?encoding=UTF-8' method='POST'>-->
<!--        <input type='hidden' name='xnQsjsdp' value=NvZbm@YyK5hotJsefbladQ$$/>-->
<!--        <input type='hidden' name='actionType' value=dW5zdWJzY3JpYmU=/>-->
<!--        <input type='hidden' name='returnURL' value='http://cayugamobile.com' />-->
<!--        <table width='481' style='border:10px solid #f4f4f4;margin: 0 auto;' cellpadding='0' cellspacing='0'>-->
<!--            <tr>-->
<!--                <td style='vertical-align: bottom;padding:10px 0px 10px 10px; font-family:Arial, Helvetica, sans-serif; font-size:13px;color: #333;'>-->
<!--                    <strong style="font-weight: bold;">Enter Your Email Id</strong>-->
<!--                </td>-->
<!--                <td style='padding:10px 0px 10px 10px;'>-->
<!--                    <input type='text' name='email' maxlength='120' style='display: inline; padding: 2px 5px;border-radius: 3px;margin:0;width:190px;border:1px solid #c4d6e2; background-color:#fbfdff; font-family:Arial, Helvetica, sans-serif; font-size:13px;'/>-->
<!--                </td>-->
<!--                <td style='padding:10px 10px 10px 0px;'>-->
<!--                    <input type='submit' style='background-color: #7a7e8a;-->
<!--color: #ffffff;-->
<!--font-weight: bold;-->
<!--font-family: Arial, Helvetica, sans-serif;-->
<!--font-size: 11px;-->
<!--border: 1px solid #616572;padding: 4px;border-radius: 3px;margin:0;' value='Unsubscribe'/>-->
<!--                </td>-->
<!--            </tr>-->
<!--        </table>-->
<!--    </form>-->

    <form style="margin: 0 0 18px;" action='https://crm.zoho.com/crm/Unsubscribe?encoding=UTF-8' method='POST'>
        <input type='hidden' name='xnQsjsdp' value=NvZbm@YyK5hotJsefbladQ$$/>
        <input type='hidden' name='actionType' value=dW5zdWJzY3JpYmU=/>
        <input type='hidden' name='returnURL' value='http://cayugamobile.com/unsubscribed' />
        <table width='481' style='border:10px solid #f4f4f4;margin: 0 auto;' cellpadding='0' cellspacing='0'>
            <tr>
                <td style='vertical-align: bottom;padding:10px 0px 10px 10px; font-family:Arial, Helvetica, sans-serif; font-size:13px;color: #333;'>
                    <strong style="font-weight: bold;">Enter Your Email Id</strong>
                </td>
                <td style='padding:10px 0px 10px 10px;'>
                    <input type='text' name='email' maxlength='120' style='display: inline; padding: 2px 5px;border-radius: 3px;margin:0;width:190px;border:1px solid #c4d6e2; background-color:#fbfdff; font-family:Arial, Helvetica, sans-serif; font-size:13px;'/>
                </td>
                <td style='padding:10px 10px 10px 0px;'>
                    <input type='submit' style='background-color: #7a7e8a;
                    color: #ffffff;
                    font-weight: bold;
                    font-family: Arial, Helvetica, sans-serif;
                    font-size: 11px;
                    border: 1px solid #616572;padding: 4px;border-radius: 3px;margin:0;' value='Unsubscribe'/>
                </td>
            </tr>
        </table>
    </form>

</div><!--end wrapper-->

<script>
    $('form').on('submit',function()
    {
        var buttonArray={}
        buttonArray["Ok"]=function() { $("#dialog").hide();$( this ).dialog( "destroy" );}
        var th=$(this);
        if(!th.hasClass('disabled'))
        {
            th.addClass('disabled')
            if($("input[name=email]").val()!="")
            {
                return true;
            }
            else
            {
                $("#dialog").empty().append("Please enter email").dialog({
                    dialogClass:'dialog',
                    position: { my: "center",at: "center",of: window},
                    draggable:false,
                    modal:true,
                    buttons:buttonArray
                });
                th.removeClass('disabled');
            }
        }
    })
</script>


