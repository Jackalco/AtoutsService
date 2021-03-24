var options = {
    
    url: urlCities,

    getValue: "name",
  
    list: {
      match: {
        enabled: true
      }
    },

  };

  console.log(urlCities)
  $("#cities").easyAutocomplete(options);
