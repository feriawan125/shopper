const pageContainer = document.getElementById('pageContainer');
var scripts = [];

function goToPage(page){ 
 
    var xhr = new XMLHttpRequest();
  
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        pageContainer.innerHTML = xhr.responseText;
  
        for (var scriptCount = 0; scriptCount < scripts.length; scriptCount++) {
          // console.log(scriptCount);
          document.body.removeChild(scripts[scriptCount]);
        }
        
        var innerScripts = pageContainer.getElementsByTagName("script");
        scripts = [];
        if (innerScripts.length > 0) {
          for (var innerScript = 0; innerScript < innerScripts.length; innerScript++) {
            // console.log(innerScripts[innerScript].innerHTML);
            // console.log(innerScripts[innerScript].src);
            eval(innerScripts[innerScript].innerHTML);
            scripts[innerScript] = document.createElement("script");
            scripts[innerScript].src = innerScripts[innerScript].src;
            document.body.appendChild(scripts[innerScript]);
          }
        }
      }else if(xhr.status == 404){
        pageContainer.innerHTML = xhr.responseText;
        xhr.open('GET', 'blank.html', true);
        xhr.send();
        return;
      }
    }
    
    xhr.open('POST', page+'.php', true);
    xhr.setRequestHeader('token', getCookie('token'));
    xhr.send();
    return;
  
}
function getCookie(name) {
  const value = `; ${document.cookie}`;
  const parts = value.split(`; ${name}=`);
  if (parts.length === 2) return parts.pop().split(';').shift();
}