var options = {
    
    data: [{"id":1,"name":"Test","category":"Service","image_id":6,"created_at":"2021-03-09T10:46:32.000000Z","updated_at":"2021-03-09T10:46:32.000000Z"},{"id":2,"name":"Garagiste","category":"Artisan","image_id":7,"created_at":"2021-03-09T12:17:17.000000Z","updated_at":"2021-03-09T12:17:17.000000Z"},{"id":3,"name":"Immobilier","category":"Logement","image_id":8,"created_at":"2021-03-09T12:17:47.000000Z","updated_at":"2021-03-09T12:17:47.000000Z"}],
  
    getValue: "name",
  
    list: {
      match: {
        enabled: true
      }
    },

  };
  
  $("#categories").easyAutocomplete(options);