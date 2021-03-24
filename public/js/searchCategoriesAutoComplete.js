var options = {
    
    data: urlCategories,
  
    getValue: "name",
  
    list: {
      match: {
        enabled: true
      }
    },

  };
  
  $("#categories").easyAutocomplete(options);