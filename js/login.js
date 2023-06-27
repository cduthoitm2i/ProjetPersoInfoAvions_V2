/*
 login.js
 */
 document.getElementById("uid").value = "Pseudo10";
 document.getElementById("pwd").value = "canada";

 document.getElementById("rememberPasswordCheck").onclick = voirmdp


 checkbox=true
 function voirmdp(){
     if(checkbox){
         document.getElementById("pwd").setAttribute("type","text")
         document.getElementById("labelcheckbox").innerHTML = "Masquer le mot de passe"
         checkbox=false
     }
     else{
         document.getElementById("pwd").setAttribute("type","password")
         document.getElementById("labelcheckbox").innerHTML = "Afficher le mot de passe" 
         checkbox=true
     }
 }