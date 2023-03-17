function get_token(){//get the auth token
    var auth_token = null;
    var countries  = null;
    $.ajax({
        type : 'GET',
        url : "https://www.universal-tutorial.com/api/getaccesstoken",
        success:function(data){
            auth_token =  data.auth_token;//if success the assign the auth_token to variable 
        },
        headers:{
            "Accept": "application/json",
            "api-token": "L0J3vyZB4Ud_thAZlAmThfpuaN02hGZMsvvS1im4odq1qt4tm-96UEqfD4BPKnb3STY",
            "user-email": "anas@gmail.com"
        },
        async:false,
    });
   return auth_token;
}

function getCountries(auth_token, country_id){//get countries list
    var countries = null;
    $.ajax({
        type : 'GET',
        url : "https://www.universal-tutorial.com/api/countries/",
        success:function(data){
            data.forEach(element=>{
                countries += '<option value="'+element.country_name+'">'+element.country_name+'</option>';
            });
            (countries != null) ? $('#'+country_id).html(countries) : '';//if not equal to null then append the html in given id
        },
        headers:{
            "Authorization": "Bearer "+auth_token,
            "Accept": "application/json"
        },
        async:false,
    });
    return countries;
}


function getStates(auth_token, state_id, country_name){//get states lists
    var states = null;
    $.ajax({
        type : 'GET',
        url : "https://www.universal-tutorial.com/api/states/"+country_name,
        success:function(data){
            data.forEach(element=>{
                states += '<option value="'+element.state_name+'">'+element.state_name+'</option>';
            });
            (states != null) ? $('#'+state_id).html(states) : '';//if not equal to null then append the html in given id
        },
        headers:{
            "Authorization": "Bearer "+auth_token,
            "Accept": "application/json"
        }
    });
}

function getCities(auth_token, city_id, state_name){//get citites\
    var cities = null;
    $.ajax({
        type : 'GET',
        url : "https://www.universal-tutorial.com/api/cities/"+state_name,
        success:function(data){
            console.log(data);
            data.forEach(element=>{
                cities += '<option value="'+element.city_name+'">'+element.city_name+'</option>';
            });
            (cities != null) ? $('#'+city_id).html(cities) : '';//if not equal to null then append the html in given id
        },
        headers:{
            "Authorization": "Bearer "+auth_token,
            "Accept": "application/json"
        }
    });
}