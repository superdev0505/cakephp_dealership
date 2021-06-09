<style>
#loadImg{position:absolute;z-index:999;}
#loadImg div{display:table-cell;width:950px;height:200px;background:#fff;text-align:center;vertical-align:middle;}
</style>
<div id="loadImg" style=""><div>Loading.....Please wait!</div></div>
<IFRAME SRC="/users/ManageS3Files" width="100%" height="200px" id="iframe1" marginheight="0" frameborder="0" onLoad="autoResize('iframe1');"> Loading.........Please wait!</iframe>

<script>
function autoResize(id){
    $("#loadImg").hide();
	var newheight;
    var newwidth;

    if(document.getElementById){
        newheight=document.getElementById(id).contentWindow.document .body.scrollHeight;
        newwidth=document.getElementById(id).contentWindow.document .body.scrollWidth;
    }
	newheight = newheight+150;
    document.getElementById(id).height= (newheight) + "px";
    document.getElementById(id).width= (newwidth) + "px";
}
</script>