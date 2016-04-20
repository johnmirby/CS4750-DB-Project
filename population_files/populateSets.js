"use strict"

var mysql = require('mysql');
var fs = require('fs');

var connection = mysql.createConnection({
  host     : 'stardock.cs.virginia.edu',
  user     : 'cs4750jmi8fs',
  password : 'cs4750mtgproject.',
  database : 'cs4750jmi8fs'
});

connection.connect(function(err){
    if(err)
        console.log(err);
});

fs.readFile('./AllSets-x.json', 'utf8', function(err, data){
    if(err)console.log("read err: " + err);
    
    var a = JSON.parse(data);
    var b = Object.keys(a);
    //console.log('hello');
    
    for (var i = 0; i < b.length; i++) {
        var block = "NULL";
        if (a[b[i]].block!= undefined)
            block = a[b[i]].block; 
        
        var q = "INSERT INTO Expansion (Expansion_Code, Expansion_Name, Release_Date, Block, Border) VALUES (\" " + a[b[i]].code.replace(/"/g, '\\"') + " \" , \" " + a[b[i]].name.replace(/"/g, '\\"') + " \" , \" " + a[b[i]].releaseDate + " \" , \" " + block + " \" , \" " + a[b[i]].border + " \" )";
        
        connection.query(q, function(err, rows){
              console.log(this.i + " of " + b.length); 
              if(err){
                console.log(err); 
              }
           }.bind({i: i}));
    }
    
    //console.log(a);
});