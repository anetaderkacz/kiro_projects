var host = "http://emardrewno.pl/cgi-bin/";

function HttpConnection(url, method, messageObject, contentType) {
    this.url = url;
    this.contentType = contentType;
    this.method = method;
    this.messageObject = messageObject;
    this.responseHandler = null;
    this.invalidResponseHandler = null;
    this.disposed = false;
};

HttpConnection.prototype.connect = function() {
                                       if (!this.responseHandler) {
                                           throw "HttpConnection response handler not set.";
                                       }
                                       var usingActiveXObject = false;
                                       if (window.XMLHttpRequest) {
                                           this.xmlHttpRequest = new XMLHttpRequest();
                                       } else if (window.ActiveXObject) {
                                           usingActiveXObject = true;
                                           this.xmlHttpRequest = new ActiveXObject("Microsoft.XMLHTTP");
                                       } else {
                                           throw "Connect failed: Cannot create XMLHttpRequest.";
                                       }
                                       var instance = this;
                                       this.xmlHttpRequest.onreadystatechange = function() {
                                                   if (!instance) {
                                                       return;
                                                   }
                                                   try {
                                                       instance.processReadyStateChange();
                                                   } finally {
                                                       if (instance.disposed) {
                                                           instance = null;
                                                       }
                                                   }
                                               };
                                       this.xmlHttpRequest.open(this.method, this.url, true);
                                       if (this.contentType && (usingActiveXObject || this.xmlHttpRequest.setRequestHeader)) {
                                           this.xmlHttpRequest.setRequestHeader("Content-Type", this.contentType);
                                       }
                                       this.xmlHttpRequest.send(this.messageObject ? this.messageObject : null);
                                   };
HttpConnection.prototype.dispose = function() {
                                       this.messageObject = null;
                                       this.responseHandler = null;
                                       this.invalidResponseHandler = null;
                                       this.xmlHttpRequest = null;
                                       this.disposed = true;
                                   };
HttpConnection.prototype.getResponseText = function() {
            return this.xmlHttpRequest ? this.xmlHttpRequest.responseText : null;
        };
HttpConnection.prototype.getResponseXml = function() {
            return this.xmlHttpRequest ? this.xmlHttpRequest.responseXML : null;
        };
HttpConnection.prototype.processReadyStateChange = function() {
            if (this.disposed) {
                return;
            }
            if (this.xmlHttpRequest.readyState == 4) {
                if (this.xmlHttpRequest.status == 200) {
                    if (!this.responseHandler) {
                        this.dispose();
                        throw "HttpConnection response handler not set.";
                    }
                    this.responseHandler(this);
                    this.dispose();
                } else {
                    if (this.invalidResponseHandler) {
                        this.invalidResponseHandler(this);
                        this.dispose();
                    } else {
                        var statusValue = this.xmlHttpRequest.status;
                        this.dispose();
                        throw "Invalid HTTP Response code (" + statusValue + ") and no handler set.";
                    }
                }
            }
        };
HttpConnection.nullMethod = function() { };

function ProcessData(con) {
    try{
        var t = con.getResponseText();
        var res = t.split(" ");
        if (res.length > 2) {
            var doConnection = false;

            if (res[1] != res[2]) doConnection = true;

            if (res[2] == '-1') {
                //Get("stat").innerText = 'Unknown';
                Get("stat").innerText = '';
            } else {
                ShowProgressBar(res, !doConnection);
            }

            if (doConnection) { setTimeout("DoConnection(0)",250);}
        }
    } catch (exception) {
        for (attribute in exception)
            log(attribute +'='+exception[attribute]);
    }
}

function ErrorProcessData(con) {
    log('ErrorProcessData!');
}


function DoConnection(start) {
    var sid = document.upload.sessionid.value;
    con = new HttpConnection(host+'progress.cgi?sid='+sid+'&start='+start, 'GET', null, 'text/html');
    con.responseHandler = ProcessData;
    con.invalidResponseHandler = ErrorProcessData;
    con.connect();
}

var start_time = 0;
var time = 0;
var read = 0;

function ShowProgressBar(res, finished) {
    var curr_time = new Date().getTime();
    var curr_read = res[1];
    var dt = curr_time - time;
    var dr = curr_read - read;
    var speed = 0;
    var total = res[2];

    if (finished) {
        dt = curr_time - start_time;
        dr = total;
    }

    if (dt > 0) {
        speed = dr/dt;
    }

    time = curr_time;
    read = curr_read;

    Get("stat").innerHTML = 'Progress:<br><br>';
    Get("stat").innerHTML += 'Read: '+Math.round(read/1024)+' KB<br>';
    Get("stat").innerHTML += 'Total: '+Math.round(total/1024)+' KB<br>';
    Get("stat").innerHTML += 'Speed: '+Math.round(speed/1.024)+' KB/s<br>';
    if (finished) Get("stat").innerHTML += '<br> Done!';
}

function Tick() {
    start_time = time = new Date().getTime();
    read = 0;
    Get("stat").innerHTML = "";
    document.upload.submit();
    document.upload.send.disabled = 'true';
    setTimeout("DoConnection(1)", 1);
}

function Get(elem) { return document.getElementById(elem); }

function Log(text) { log(text); }

function log(text) {
    Get("log").innerHTML = text+"<br>"+Get("log").innerHTML;
//    Get("log").innerHTML += "<br>"+text;

    Get("log").innerHTML = Get("log").innerHTML.substring(0,5120);
}
