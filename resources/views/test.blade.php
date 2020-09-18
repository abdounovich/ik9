<!DOCTYPE html>
<html>

<body>
    <style type="text/css">
        .button {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            width: 50%;
            margin: 25%;
        }
    </style>
<form id="myForm" method="POST" action="/test2">
    @csrf
    message <input type="text" name="message"><br>
    id <input type="text" name="id"><br>

    <input type="button" onclick="sendMessage()" value="Submit form">
  </form>

    <script type="text/javascript">
        function sendMessage() {
            document.getElementById("myForm").submit();

        
            MessengerExtensions.requestCloseBrowser(function success() {

            }, function error(err) {

            });
        }

        (function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) { return; }
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.com/en_US/messenger.Extensions.js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, "script", "Messenger"));

        window.extAsyncInit = function () {
            // the Messenger Extensions JS SDK is done loading
            MessengerExtensions.getUserID(function success(uids) {
                var psid = uids.psid;//This is your page scoped sender_id
                element.setAttribute(id, psid);

            }, function error(err) {
                alert("Messenger Extension Error: " + err);
            });
        };
    </script>
</body>
</html>