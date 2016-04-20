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


connection.query("TRUNCATE TABLE Card");
connection.query("TRUNCATE TABLE Artifact");
connection.query("TRUNCATE TABLE Creature");
connection.query("TRUNCATE TABLE Enchantment");
connection.query("TRUNCATE TABLE Instant");
connection.query("TRUNCATE TABLE Land");
connection.query("TRUNCATE TABLE Planeswalker");
connection.query("TRUNCATE TABLE Printed_In");
connection.query("TRUNCATE TABLE Sorcery");


var ignore = ['phenomenon', 'plane', 'scheme', 'vanguard', 'token'];


fs.readFile('./AllCards-x.json', 'utf8', function(err, data){
    if(err){console.log("error")};
    
    var a = JSON.parse(data);
    
    //console.log(a);
    
    var b = Object.keys(a)
    
    //console.log(a[b[1]]);
    
    for(var i = 0; i < b.length; i++){
        
        //console.log(a[b[i]]);
        
        if(ignore.indexOf(a[b[i]].layout) >= 0 || a[b[i]].type === "Conspiracy"){ //phenomenon plane scheme vanguard  
            continue;
        } else {
           if(a[b[i]].text == undefined)
            var q = "INSERT INTO Card (Card_Name, Rules_Text) VALUES (\" " + a[b[i]].name.replace(/"/g, '\\"') + " \" , \" " + " \" )";
           else 
            var q = "INSERT INTO Card (Card_Name, Rules_Text) VALUES (\" " + a[b[i]].name.replace(/"/g, '\\"') + " \" , \" " + a[b[i]].text.replace(/"/g, '\\"') + " \" )";
           connection.query(q, function(err, rows){
              console.log(this.i + " of " + b.length); 
              if(err){
                console.log(err); 
                console.log("this is the text: " + a[b[this.i]].text.replace(/"/g, '\\"'));
              }
           }.bind({i: i}));
           
            for (var j = 0; j < a[b[i]].printings.length; j++){
                var qSet = "INSERT INTO Printed_In (Card_Name, Expansion_Code) VALUES (\" " + a[b[i]].name.replace(/"/g, '\\"') + " \" , \" " + a[b[i]].printings[j] + " \" )";
                connection.query(qSet, function(err, rows){
                    if(err){
                        console.log("INSERT INTO PRINTED_IN ERROR: \n" + err);
                    }
                });
            }
            
        }

//====================================================================================
        
       if(a[b[i]].types.indexOf('Land') >= 0){
           var legendary = 0;
           if(a[b[i]].supertypes !== undefined){
               if(a[b[i]].supertypes.indexOf("Legendary") >= 0){
                   legendary = 1;
               }
           }
           
           var landQ = "";
           if(a[b[i]].subtypes != undefined){
               landQ = "INSERT INTO Land (Card_Name, Subtype, Legendary) VALUES (\" " + a[b[i]].name.replace(/"/g, '\\"') + " \" , \" " + a[b[i]].subtypes.join() + " \" , \" " + legendary + " \" )";
           } else {
               landQ = "INSERT INTO Land (Card_Name, Subtype, Legendary) VALUES (\" " + a[b[i]].name.replace(/"/g, '\\"') + " \" , NULL , \" " + legendary + " \" )";
           }
           
           connection.query(landQ, function(err, rows){
               if(err){
                   console.log("INSERT INTO LAND ERROR: \n" + err);
               }
           });
        }

//====================================================================================        
        
       if(a[b[i]].types.indexOf('Artifact') >= 0){
           var legendary = 0;
           if(a[b[i]].supertypes !== undefined){
               if(a[b[i]].supertypes.indexOf("Legendary") >= 0){
                   legendary = 1;
               }
           }
           
           var artifactQ = "";
           
           if(a[b[i]].subtypes != undefined){
               artifactQ = "INSERT INTO Artifact (Card_Name, Subtype, Legendary, Mana_Cost) VALUES (\" " + a[b[i]].name.replace(/"/g, '\\"') + " \" , \" " + a[b[i]].subtypes.join() + " \" , \" " + legendary + " \" , \" " + a[b[i]].manaCost + " \" )";
           } else {
               artifactQ = "INSERT INTO Artifact (Card_Name, Subtype, Legendary, Mana_Cost) VALUES (\" " + a[b[i]].name.replace(/"/g, '\\"') + " \" , NULL , \" " + legendary + " \" , \" " + a[b[i]].manaCost + " \" )";
           }
           
           connection.query(artifactQ, function(err, rows){
               if(err){
                   console.log("INSERT INTO ARTIFACT ERROR: \n" + err);
               }
           });
       }
       
//====================================================================================
       
       if(a[b[i]].types.indexOf('Creature') >= 0){
            var legendary = 0;
            if(a[b[i]].supertypes !== undefined){
               if(a[b[i]].supertypes.indexOf("Legendary") >= 0){
                   legendary = 1;
               }
           }
           
           var creatureQ = "";
           
           if(a[b[i]].subtypes != undefined){
               creatureQ = "INSERT INTO Creature (Card_Name, Subtype, Legendary, Mana_Cost, Power, Toughness) VALUES (\" " + a[b[i]].name.replace(/"/g, '\\"') + " \" , \" " + a[b[i]].subtypes.join() + " \" , \" " + legendary + " \" , \" " + a[b[i]].manaCost + " \" , \" " + a[b[i]].power + " \" , \" " + a[b[i]].toughness + " \" )";    
           } else {
               creatureQ = "INSERT INTO Creature (Card_Name, Subtype, Legendary, Mana_Cost, Power, Toughness) VALUES (\" " + a[b[i]].name.replace(/"/g, '\\"') + " \" , NULL , \" " + legendary + " \" , \" " + a[b[i]].manaCost + " \" , \" " + a[b[i]].power + " \" , \" " + a[b[i]].toughness + " \" )";
           }
           
           connection.query(creatureQ, function(err, rows){
               if(err){
                   console.log("INSERT INTO CREATURE ERROR: \n" + err);
               }
           });
        }


//====================================================================================


        if(a[b[i]].types.indexOf('Enchantment') >= 0){
           var legendary = 0;
           if(a[b[i]].supertypes !== undefined){
               if(a[b[i]].supertypes.indexOf("Legendary") >= 0){
                   legendary = 1;
               }
           }
           
           var enchantmentQ = "";
           
           if(a[b[i]].subtypes != undefined){
               enchantmentQ = "INSERT INTO Enchantment (Card_Name, Subtype, Legendary, Mana_Cost) VALUES (\" " + a[b[i]].name.replace(/"/g, '\\"') + " \" , \" " + a[b[i]].subtypes.join() + " \" , \" " + legendary + " \" , \" " + a[b[i]].manaCost + " \" )";   
           } else {
               enchantmentQ = "INSERT INTO Enchantment (Card_Name, Subtype, Legendary, Mana_Cost) VALUES (\" " + a[b[i]].name.replace(/"/g, '\\"') + " \" ,  NULL  , \" " + legendary + " \" , \" " + a[b[i]].manaCost + " \" )";
           }
           connection.query(enchantmentQ, function(err, rows){
               if(err){
                   console.log("INSERT INTO ENCHANTMENT ERROR: \n" + err);
               }
           });
        }
        
//====================================================================================
        
        if(a[b[i]].types.indexOf('Planeswalker') >= 0){
           var planeswalkerQ = "INSERT INTO Planeswalker (Card_Name, Planeswalker_Name, Loyalty, Mana_Cost) VALUES (\" " + a[b[i]].name.replace(/"/g, '\\"') + " \" , \" " + a[b[i]].subtypes[0] + " \" , \" " + a[b[i]].loyalty + " \" , \" " + a[b[i]].manaCost + " \" )";
           connection.query(planeswalkerQ, function(err, rows){
               if(err){
                   console.log("INSERT INTO PLANESWALKER ERROR: \n" + err);
               }
           });
        }
        
//====================================================================================        
        
        if(a[b[i]].types.indexOf('Instant') >= 0){           
           var instantQ = "INSERT INTO Instant (Card_Name, Mana_Cost) VALUES (\" " + a[b[i]].name.replace(/"/g, '\\"') + " \" , \" " + a[b[i]].manaCost + " \" )";
           connection.query(instantQ, function(err, rows){
               if(err){
                   console.log("INSERT INTO INSTANT ERROR: \n" + err);
               }
           });
        }

//====================================================================================

        if(a[b[i]].types.indexOf('Sorcery') >= 0){
           var sorceryQ = "INSERT INTO Sorcery (Card_Name, Mana_Cost) VALUES (\" " + a[b[i]].name.replace(/"/g, '\\"') + " \" , \" " + a[b[i]].manaCost + " \" )";
           connection.query(sorceryQ, function(err, rows){
               if(err){
                   console.log("INSERT INTO SORCERY ERROR: \n" + err);
               }
           });
        }
    }    
});


//connection.end();