export class Product {
    constructor({id, sku, price, currency, slug, published, createdAt, updatedAt}) {
        if (!id || !sku || !price || !currency || !slug || !published || !createdAt || !updatedAt) {
            throw Error("id, price, currency, slug, published, createdAt and updatedAt are required properties")
        }
        this.id = id
        this.sku = sku
        this.price = price
        this.currency = currency
        this.slug = slug
        this.published = published
        this.createdAt = createdAt
        this.updatedAt = updatedAt
    }
}
