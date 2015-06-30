var express = require('express'),
    app = express();

app.use(express.static(__dirname + ''));

app.listen(8000);
console.log('Server started on localhost:8000; press Ctrl-C to terminate....');

