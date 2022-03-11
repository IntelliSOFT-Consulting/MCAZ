const got = require('got');

exports.handler = function(context, event, callback) {
  console.log(event);

 const responses = got('https://bongalake-messages.azurewebsites.net/api/HttpTriggerJS1?code=wgqgxrteYWNA1yP4Yjh/XGnRSxHs/gG2gLYfy9azoP1edaDk14PpXQ==&name=MzeeMzima');

  responses.then(function(result) {
     console.log('promise fulfilled');
     console.log(result.body); //will log results.
     //callback(null, msg);
    }).catch(function(result) {
     console.log('promise failed');
    });

  const msg = 'End message on Message sent';
  console.info(msg);
  
};

  var responses2 = got('https://bongastore.azurewebsites.net/api/HttpTriggerCSharp1?code=PaYtLrUAfgx48EUDebjYEcnrfkMiyLP7DFrcyexAI7gTRNAapNhYpA==',
   {method: "POST",
    body:
     {name: "Les", message: "remuers"}
    });

  responses2.then(function(result) {
     console.log('promise fulfilled');
     console.log(result); //will log results.
     //callback(null, msg);
    }).catch(function(result) {
     console.log('promise failed');
    });


//---------------------------------Settled on
var got = require('got');
var requestPayload = {foo: 'bar'};

var response = got.post('https://bongastore.azurewebsites.net/api/HttpTriggerCSharp1?code=PaYtLrUAfgx48EUDebjYEcnrfkMiyLP7DFrcyexAI7gTRNAapNhYpA==', 
  { body: requestPayload, 
    headers: { 
      'Accept': 'application/json', 
      'Content-Type': 'application/json' 
  }, 
  json: true
});

response.then(function(response) {
  console.log(requestPayload);
  console.log(response.body);
}).catch(function(error) {
    console.log(response.body);
});