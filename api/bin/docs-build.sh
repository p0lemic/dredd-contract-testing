#!/usr/bin/env bash

rm -f ./spec/openapi_v3.json
rm -f ./spec/swagger_2.json
./node_modules/.bin/json-refs resolve ./spec/openapi_v3.yml --filter relative > ./spec/openapi_v3.json
./node_modules/.bin/api-spec-converter --from=openapi_3 --to=swagger_2 --syntax=json --order=alpha ./spec/openapi_v3.json > ./spec/swagger_v2.json
