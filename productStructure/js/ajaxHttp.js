var xhr = doCallAjax();

function doCallAjax() {
    xhr = false;
    if (window.XMLHttpRequest) { // Mozilla, Safari,...
        xhr = new XMLHttpRequest();
        if (xhr.overrideMimeType) {
            xhr.overrideMimeType('text/html');
        }
        return xhr;
    } else if (window.ActiveXObject) { // IE
        try {
            xhr = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {
            try {
                xhr = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {}
        }
        return xhr;
    }

    if (!xhr) {
        alert('Cannot create XMLHTTP instance');
        return false;
    }
}


