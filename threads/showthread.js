function show_form(elem)
{
    if( document.getElementById('txt' + elem.id).style.display == "none" ){
        document.getElementById('txt' + elem.id).style.display = "inherit";
        document.getElementById('sub' + elem.id).style.display = "inherit";
    }
    else{
        document.getElementById('txt' + elem.id).style.display = "none";
        document.getElementById('sub' + elem.id).style.display = "none";
    }
}
