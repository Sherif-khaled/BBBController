
(function worker() {
    $.ajax({
        url: "/checkserver",
        success: function(data) {
            if(data.hasOwnProperty("not_responding")){
                $('#serverStatus').attr('class','alert alert-danger');
                $('#serverStatus').html(data.not_responding + "<strong><a href='#demo' data-toggle='collapse'>Suggestions</a></strong>\n" +
                    "<div id='demo' class='collapse'>\n" +
                    "<ol>" +
                    "<li>Check the server if is running.</li>" +
                    "<li>Check if the server URL or ip is correct.</li>" +
                    "<li>Check the server firewall settings.</li>" +
                    "</ol>" +
                    "</div>");
            }
            else if(data.hasOwnProperty("port_refused")){
                $('#serverStatus').attr('class','alert alert-danger');
                $('#serverStatus').html(data.port_refused + "<strong><a href='#demo' data-toggle='collapse'>Suggestions</a></strong>\n" +
                    "<div id='demo' class='collapse'>\n" +
                    "<ol>" +
                    "<li>Check the server if is running.</li>" +
                    "<li>Check if the server URL or ip is correct.</li>" +
                    "<li>Check the SSH port on server firewall.</li>" +
                    "</ol>" +
                    "</div>");
            }
            else if(data.hasOwnProperty("authentication_failure")){
                $('#serverStatus').attr('class','alert alert-danger');
                $('#serverStatus').html(data.authentication_failure + "<strong><a href='#demo' data-toggle='collapse'>Suggestions</a></strong>\n" +
                    "<div id='demo' class='collapse'>\n" +
                    "<ol>" +
                    "<li>Check the username or password</li>" +
                    "<li>Check if the ssh identity file is correct.</li>" +
                    "<li>Check the public key.</li>" +
                    "</ol>" +
                    "</div>");
            }
            else if(data.hasOwnProperty("success")){
                $('#serverStatus').attr('class','alert alert-success');
                $('#serverStatus').html(data.success);
            }

        },
        complete: function() {
            // Schedule the next request when the current one's complete
            setTimeout(worker, 3000);
        }
    });
})();


