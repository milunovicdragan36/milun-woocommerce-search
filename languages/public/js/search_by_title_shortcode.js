
    


 var newURL = window.location.protocol + "//" + window.location.host + window.location.pathname;

var xhr = new XMLHttpRequest();
xhr.open("GET", newURL+"/wp-content/plugins/milun-search/public/js/file-shortcode.js", false);
xhr.send();
eval(xhr.responseText);



