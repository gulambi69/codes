function seterror(id,msg)
{
    document.getElementById(id).innerHTML=msg;
}
function validateForm()
{
    var returnval=true;
    var cn= /^[A-Z a-z]+$/; 
    var m;
    var n=document.getElementById("name").value;
    if(n=="")
    {
        seterror("error1","Name cannot be empty");
        returnval=false;
    }
    else if(n.match(cn))
    return val=true;
    else{
        seterror("error1","Name must contain only letters of alphabet");
        returnval=false;
    }
    var r=document.getElementById("roll").value;
    if(r=="")
    {
        seterror("error2","Roll No. cannot be empty");
        returnval=false;
    }
    else if(r.substr(2,5)=="HCS"&&r.length()==9)
    {
        returnval=true;
    }
    else{
        seterror("error2","Roll No. must be in yyhcsrrrr format");
        returnval=false;
    }
    var g=document.myform.gender;
    var c=0;
    for(var i=0;i<g.length;i++)
    {
        if(g[i].checked==true){
            c++;
            break;
        }
    }
    if(c==0){
        seterror("error4","Please select a gender");
        returnval=false;
    }
    var soc=document.myform.society;
    var f=0;
    for(var i=0;i<soc.length;i++)
    {
        if(soc[i].checked==true){
            f++;
            break;
        }
    }
    if(f==0){
        seterror("error5","Please select a society");
        returnval=false;
    }
    return returnval;
}