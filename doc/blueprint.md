FORMAT: 1A
HOST: http://example.com/api/v1

# RESTful hash generator api
Generate hash randomly or using user supplied parameters.

# Group Hashes
Hash resource an algorithm be specified, while seed and salt are optional.

## Hash [/hash/{algorithm}{?seed,salt}]

### Retrieve a hash [GET]

+ Parameters

    + algorithm (string, required) - Algorithm used to generate hash.

    + seed (string, optional) - Base64 encoded string to be hashed.
        + Default: `''`

    + salt (string, optional) - Base64 encoded string to be used as salt.
        + Default: `''`

+ Response 200 (application/json)

    + Body

            {
                "result": "3858f62230ac3c915f300c664312c63f",
                "algorithm": "md5"
            }

+ Response 404 (application/json)

    + Body

            {
                "error": "Algorithm XXX not found.",
                "code": 404
            }

+ Response 500 (application/json)

    + Body

            {
                "error": "Internal server error.",
                "code": 500
            }
