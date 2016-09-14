---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---

# Info

Welcome to the generated API reference.
[Get Postman Collection](public/docs/collection.json)

# Available routes
#general
## API Login, on success return JWT Auth token

> Example request:

```bash
curl "http://localhost//api/authenticate" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/authenticate",
    "method": "POST",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`POST /api/authenticate`


## Log out
Invalidate the token, so user cannot use it anymore
They have to relogin to get a new token

> Example request:

```bash
curl "http://localhost//api/logout" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/logout",
    "method": "POST",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`POST /api/logout`


## Refresh the token

> Example request:

```bash
curl "http://localhost//api/token" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/token",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/token`

`HEAD /api/token`


## /api/fruits

> Example request:

```bash
curl "http://localhost//api/fruits" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/fruits",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
[
    {
        "id": 7,
        "name": "apple",
        "color": "green",
        "weight": 150,
        "delicious": 1,
        "created_at": "2016-08-07 16:38:49",
        "updated_at": "2016-08-07 16:38:49"
    },
    {
        "id": 8,
        "name": "banana",
        "color": "yellow",
        "weight": 116,
        "delicious": 1,
        "created_at": "2016-08-07 16:38:49",
        "updated_at": "2016-08-07 16:38:49"
    },
    {
        "id": 9,
        "name": "strawberries",
        "color": "red",
        "weight": 12,
        "delicious": 1,
        "created_at": "2016-08-07 16:38:49",
        "updated_at": "2016-08-07 16:38:49"
    }
]
```

### HTTP Request
`GET /api/fruits`

`HEAD /api/fruits`


## /api/fruit/{id}

> Example request:

```bash
curl "http://localhost//api/fruit/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/fruit/{id}",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/fruit/{id}`

`HEAD /api/fruit/{id}`


## Returns the authenticated user

> Example request:

```bash
curl "http://localhost//api/authenticated_user" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/authenticated_user",
    "method": "GET",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```

> Example response:

```json
null
```

### HTTP Request
`GET /api/authenticated_user`

`HEAD /api/authenticated_user`


## /api/fruits

> Example request:

```bash
curl "http://localhost//api/fruits" \
-H "Accept: application/json" \
    -d "name"="ratione" \
    -d "color"="dolor" \
    -d "weight"="95930246" \
    -d "delicious"="1" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/fruits",
    "method": "POST",
    "data": {
        "name": "ratione",
        "color": "dolor",
        "weight": 95930246,
        "delicious": true
},
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`POST /api/fruits`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | 
    color | string |  required  | Only alphabetic characters allowed
    weight | numeric |  required  | 
    delicious | boolean |  required  | 

## /api/fruits/{id}

> Example request:

```bash
curl "http://localhost//api/fruits/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://localhost//api/fruits/{id}",
    "method": "DELETE",
        "headers": {
    "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
console.log(response);
});
```


### HTTP Request
`DELETE /api/fruits/{id}`


