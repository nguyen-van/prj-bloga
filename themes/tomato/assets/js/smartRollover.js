/* スマートロールオーバー */
function smartRollover(){if(document.getElementsByTagName)for(var b=document.getElementsByTagName("img"),a=0;a<b.length;a++)b[a].getAttribute("src").match("_out.")&&(b[a].onmouseover=function(){this.setAttribute("src",this.getAttribute("src").replace("_out.","_over."))},b[a].onmouseout=function(){this.setAttribute("src",this.getAttribute("src").replace("_over.","_out."))})}window.addEventListener?window.addEventListener("load",smartRollover,!1):window.attachEvent&&window.attachEvent("onload",smartRollover);
