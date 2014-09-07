<script type="text/javascript" charset="utf-8">
    function closeEditorWarning() {
        return 'It looks like you have been editing something -- if you leave before submitting your changes will be lost.'
    }
    window.onbeforeunload = closeEditorWarning;

    var apiKey = '44966052';
    var sessionid = '<?php echo $chat['Chat']['sessionid']; ?>';
    var token = '<?php echo $chat['Chat']['token']; ?>';

    TB.addEventListener("exception", exceptionHandler);
    var session = TB.initSession(sessionid); // Replace with your own session ID. See https://dashboard.tokbox.com/projects
    TB.setLogLevel(TB.DEBUG);
    session.addEventListener("sessionConnected", sessionConnectedHandler);
    session.addEventListener("streamCreated", streamCreatedHandler);
    session.connect(apiKey, token); // Replace with your API key and token. See https://dashboard.tokbox.com/projects

    function sessionConnectedHandler(event) {
        console.log("connected");
        subscribeToStreams(event.streams);
        session.publish();
    }

    function streamCreatedHandler(event) {
        console.log("created");
        subscribeToStreams(event.streams);
    }
    function subscribeToStreams(streams) {
        for (var i = 0; i < streams.length; i++) {
            var stream = streams[i];
            if (stream.connection.connectionId != session.connection.connectionId) {
                session.subscribe(stream);
            }
        }
    }
    function exceptionHandler(event) {
        alert(event.message);
    }
</script>
