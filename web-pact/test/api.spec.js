'use strict';

const { pactWith } = require('jest-pact');
const { Matchers } = require('@pact-foundation/pact');

import { ProductAPIClient } from "../src/api";
import {Product} from "../src/product";
import path from "path";
const LOG_LEVEL = process.env.LOG_LEVEL || 'WARN';

pactWith(
    {
        consumer: 'productWeb-pact',
        provider: 'productApi-pact',
        dir: path.resolve(process.cwd(), './pacts'),
        logLevel: LOG_LEVEL,
    },
    (provider) => {
        describe('Products API', () => {
            const expectedProduct = {
                id: 'e7ba4c75-b1bb-483d-94d8-2c4a10f78472',
                title: 'Lagavulin 16 Years',
                sku: '556312',
                price: 89.90,
                currency: '€',
                slug: 'lagavulin-16-years',
                published: true,
                createdAt: '1970-01-01T00:00:00.001Z',
                updatedAt: '1970-01-01T00:00:00.001Z',
            };

            const productsSuccessResponse = {
                status: 200,
                headers: {
                    'Content-Type': 'application/json',
                },
                body: [expectedProduct],
            };

            const productsListRequest = {
                uponReceiving: 'a request for products',
                withRequest: {
                    method: 'GET',
                    path: '/products',
                    headers: {
                        Accept: 'application/json',
                    },
                },
            };

            beforeEach(() => {
                const interaction = {
                    state: 'i have a list of products',
                    ...productsListRequest,
                    willRespondWith: productsSuccessResponse,
                };
                return provider.addInteraction(interaction);
            });

            // add expectations
            it('returns a successful body', () => {
                const api = new ProductAPIClient(provider.mockService.baseUrl);
                return api.getAllProducts().then((products) => {
                    expect(products).toStrictEqual([new Product(expectedProduct)]);
                });
            });
        });
    }
);
