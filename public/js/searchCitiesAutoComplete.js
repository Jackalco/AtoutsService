var options = {
    
    url: "../json/cities.json",

    getValue: "name",
  
    list: {
      match: {
        enabled: true
      }
    },

  };
  
  $("#cities").easyAutocomplete(options);
