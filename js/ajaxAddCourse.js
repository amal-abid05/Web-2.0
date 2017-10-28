
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

function insertCourse() {

    var xhrCourse = createXHR();

// Optional: Show a waiting message in the layer with ID login_response
    document.getElementById('addResp').innerHTML = "Just a second..."


// Required: verify that all fileds is not empty. Use encodeURI() to solve some issues about character encoding.
    var ptitle		= encodeURI(document.getElementById('ptitle').value);
    var descrip 	= encodeURI(document.getElementById('descrip').value);
    var plevel 		= encodeURI(document.getElementById('plevel').value);




    xhrCourse.onreadystatechange = function() {
        if(xhrCourse.readyState == 4 && xhrCourse.status == 200){
            var response = xhrCourse.responseText;
// if it is ok show a message: "xx added + xx".
            document.getElementById('addResp').innerHTML = 'Course added '+response;

            window.document.getElementById("ptitle").value="";
            window.document.getElementById("descrip").value="";
            window.document.getElementById("plevel").value="";

        }
    }
/*
    xhrCourse.open('GET', 'actionAddCourse.php?'+"ptitle="+ptitle+"&descrip="+descrip+"&plevel="+plevel, true);
    xhrCourse.send();
*/
    xhrCourse.open('POST', 'actionAddCourse.php', true);
// Set content type header information for sending url encoded variables in the request
    xhrCourse.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhrCourse.send("ptitle="+ptitle+"&descrip="+descrip+"&plevel="+plevel);

}


