
/* ---------------------------- */
/* XMLHTTPRequest Enable */
/* ---------------------------- */

function createXHR()
{
    if (window.XMLHttpRequest)
    {
        return new XMLHttpRequest();

    }
}




/* -------------------------- */
/* INSERT */
/* -------------------------- */

function insertComment() {

    var xhrComment = createXHR();

    var comment = document.getElementById("comment").value;
    var name = document.getElementById("username").value;
    var user_id = document.getElementById("user_id").value;
    var course_id = document.getElementById("course_id").value;


    xhrComment.onreadystatechange = function() {
        if(xhrComment.readyState == 4 && xhrComment.status == 200){
            var response = xhrComment.responseText;
// if it is ok show a message: "xx added + xx".
            document.getElementById("all_comments").innerHTML=response+document.getElementById("all_comments").innerHTML;

            document.getElementById("comment").value="";
            document.getElementById("username").value="";

        }
    }

    xhrComment.open('GET', 'actionAddComment.php?'+"comment="+comment+"&name="+name+"&user_id="+user_id+"&course_id="+course_id, true);
    xhrComment.send();



}



