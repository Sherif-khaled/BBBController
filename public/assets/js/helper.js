//Convert image URL to Base64
function getBase64Image(url, callback) {
    let request = new
    XMLHttpRequest();   request.onload = function() {
        let file = new FileReader();
        file.onloadend = function() {
            callback(file.result);
        }
        file.readAsDataURL(request.response);   };
        request.open('GET', url);
        request.responseType = 'blob';
        request.send();
}